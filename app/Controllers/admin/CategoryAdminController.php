<?php

namespace App\Controllers\Admin;

use App\Models\Admin\CategoryAdminModel;

use App\Controllers\BaseController;

use Exception;

class CategoryAdminController extends BaseController
{
    protected $categoryAdminModel;

    public function __construct()
    {
        $this->categoryAdminModel = new CategoryAdminModel();
    } 

    public function category_list()
    {
        $categories = $this->categoryAdminModel->list();

        $this->render('admin.categories.all_categories', compact('categories'));
    }

    public function category_delete($id)
    {
        try {
            $result = $this->categoryAdminModel->delete('categories', $id);
            
            if ($result === true) {
                echo json_encode(['status' => 'success', 'message' => 'Category deleted successfully']);
            } else {
                if (strpos($result, 'Cannot delete or update a parent row: a foreign key constraint fails') !== false) {
                    echo json_encode(['status' => 'error', 'message' => 'Cannot delete this category because it is associated with existing articles.']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'An error occurred: ' . $result]);
                }
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    public function category_add()
    {
        try {
            start_session();
            if ($this->isPost() && isset($_POST['btn-add'])) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $result = $this->categoryAdminModel->add($name, $description);
                if ($result) {
                    $_SESSION['toastr'] = [
                        'type' => 'success',
                        'message' => 'Category added successfully'
                    ];
                } else {
                    $_SESSION['toastr'] = [
                        'type' => 'error',
                        'message' => 'Failed to add category'
                    ];
                }
            }
            $this->redirect(BASE_URL_ADMIN. 'category-list');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
?>