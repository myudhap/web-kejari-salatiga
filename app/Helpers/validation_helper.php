<?php

namespace Config;

use CodeIgniter\Validation\Validation;

if (!function_exists('validate_input')) {
    /**
     * Validates input data based on provided rules.
     *
     * @param array $data The input data to validate.
     * @param array $rules The validation rules.
     * @param array $messages Optional custom error messages.
     * @return array An array containing the validation result and errors.
     */
    function validate_input(array $data, array $rules, array $messages = []): array
    {
        $validation = service('validation');

        // Set the rules and messages
        $validation->setRules($rules, $messages);

        // Run the validation
        if ($validation->run($data)) {
            return ['success' => true, 'errors' => []];
        } else {
            // Generate dynamic error messages
            $dynamicErrors = [];
            $errors = $validation->getErrors();

            foreach ($errors as $field => $error) {
                // Check if a custom message is provided for the field
                if (isset($messages[$field])) {
                    $dynamicErrors[$field] = $messages[$field];
                } else {
                    // Generate dynamic error message based on the rule
                    $fieldRules = $rules[$field];
                    $ruleParts = explode('|', $fieldRules);

                    foreach ($ruleParts as $rule) {
                        $ruleName = explode('[', $rule)[0];
                        switch ($ruleName) {
                            case 'required':
                                $dynamicErrors[$field] = "{field} is required.";
                                break;
                            case 'min_length':
                                $minLength = explode('[', $rule)[1];
                                $minLength = trim($minLength, '[]');
                                $dynamicErrors[$field] = "{field} must be at least {min_length} characters long.";
                                break;
                            case 'max_length':
                                $maxLength = explode('[', $rule)[1];
                                $maxLength = trim($maxLength, '[]');
                                $dynamicErrors[$field] = "{field} must not exceed {max_length} characters.";
                                break;
                            case 'valid_email':
                                $dynamicErrors[$field] = "{field} must be a valid email address.";
                                break;
                            case 'is_unique':
                                $tableField = explode('[', $rule)[1];
                                $tableField = trim($tableField, '[]');
                                $dynamicErrors[$field] = "{field} is already in use.";
                                break;
                            default:
                                $dynamicErrors[$field] = "{field} is invalid.";
                                break;
                        }
                    }
                }
            }

            // Replace placeholders with actual field names and values
            foreach ($dynamicErrors as $field => $message) {
                $dynamicErrors[$field] = str_replace('{field}', ucfirst($field), $message);
                if (strpos($message, '{min_length}') !== false) {
                    $minLength = explode('[', $rules[$field])[1];
                    $minLength = trim($minLength, '[]');
                    $dynamicErrors[$field] = str_replace('{min_length}', $minLength, $dynamicErrors[$field]);
                }
                if (strpos($message, '{max_length}') !== false) {
                    $maxLength = explode('[', $rules[$field])[1];
                    $maxLength = trim($maxLength, '[]');
                    $dynamicErrors[$field] = str_replace('{max_length}', $maxLength, $dynamicErrors[$field]);
                }
            }

            return ['success' => false, 'errors' => $dynamicErrors];
        }
    }
}
