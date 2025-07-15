<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JaksaModel;

use function Config\validate_input;

class Jaksa extends BaseController
{
    protected $data;
    protected $model;

    public function __construct()
    {
        $this->data = [
            "title" => "Jaksa"
        ];
        $this->model = new JaksaModel();
    }

    public function index()
    {
        $this->data['subtitle'] = "Jaksa";

        $page = (int) ($this->request->getVar('page') ?? 1);
        $limit = (int) ($this->request->getVar('limit') ?? 10);
        $offset = ($page - 1) * $limit;

        $this->data['jaksas'] = $this->model->findAll($limit, $offset);

        $this->data['total'] = $this->model->countAll();
        $this->data['page'] = $page;
        $this->data['limit'] = $limit;

        return view('admin/jaksa', $this->data);
    }

    public function store()
    { 
        $rules = [
            'nama' => 'required|string|max_length[255]',
            'nip' => 'required|string|max_length[40]',
            'status' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost(['nama', 'nip', 'status']);
        if($this->model->insert($data)) {
            return redirect()->back()->with('success', 'Jaksa berhasil ditambahkan.');
        }

        return redirect()->back()->with("error", "Gagal menambahkan data jaksa");
    }

    public function toggleStatus($id)
    {
        if (!$this->request->isAJAX()) {
            return $this->response
                ->setStatusCode(ResponseInterface::HTTP_FORBIDDEN)
                ->setJSON([
                    'success' => false,
                    'message' => 'Akses tidak diizinkan.'
                ]);
        }
        $status = (int) $this->request->getPost('status');

        $jaksa = $this->model->find($id);
        if (!$jaksa) {
            return $this->response
                ->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
                ->setJSON([
                    'success' => false,
                    'message' => 'Data jaksa tidak ditemukan'
                ]);
        }

        $updated = $this->model->update($id, ['status' => $status]);

        return $this->response->setJSON([
            'success' => (bool) $updated,
            'message' => $updated ? 'Status diperbarui' : 'Gagal menyimpan'
        ]);
    }

    public function update($id)
    {
        $rules = [
            'nama' => 'required|string|max_length[255]',
            'nip' => 'required|string|max_length[20]',
            'status' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost(['nama', 'nip', 'status']);
        if ($this->model->update($id, $data)) {
            return redirect()->back()->with('success', 'Jaksa berhasil diperbarui.');
        }

        return redirect()->back()->with("error", "Gagal memperbarui data jaksa");
    }
    
    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->back();
    }
}
