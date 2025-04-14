<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BaseModel;
use App\Models\CommentModel;

class CommentAdminController extends BaseController
{
  protected $commentModel;

  public function __construct()
  {
    $this->commentModel = new CommentModel();
  }

  // Hiển thị danh sách bình luận
  public function index()
  {
    $comments = $this->commentModel->getAllComments();

    // dd($comments);

    $this->render('admin.comments.all_comment', ['comments' => $comments]);
  }

  // Xoá bình luận theo ID
  public function delete($id)
  {
    $deleted = $this->commentModel->delete('comments', $id);

    if ($deleted) {
      $this->setFlash('success', 'Đã xóa bình luận thành công.');
    } else {
      $error = end($this->commentModel->getErrors());
      $this->setFlash('error', $this->getFriendlyErrorMessage($error));
    }


    $this->redirect(BASE_URL . '/admin/comments');
  }
}
