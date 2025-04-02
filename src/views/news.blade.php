@extends('layouts.master')

@section('title', 'News')
@section('style')
<style>
  .content-box {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: 20px 0;
  }

  pre {
      white-space: pre-wrap;
      font-size: 16px;
      font-family: Arial, Helvetica, sans-serif;
  }

  pre img {
      margin: 5px;
  }

  .message-item {
      background-color: #f9f9f9;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin: 10px 0;
  }

  .message-header {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
  }

  .message-avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 10px;
      object-fit: cover;
  }

  .message-username {
      font-weight: bold;
      font-size: 16px;
  }

  .message-time {
      color: #888;
      font-size: 14px;
      margin-left: auto;
  }

  .message-content {
      font-size: 15px;
      color: #333;
  }

  .message-actions {
      margin-top: 10px;
      display: flex;
      justify-content: flex-end;
  }

  .message-actions button {
      margin-left: 5px;
  }
</style>
@endsection
@section('content')
<div class="container-fluid">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
       
        <div class="content-box">
          <h2 class="article-title"><?php echo $data['title']; ?></h2>
          <h5 class="h5 article-title">Author: <?php echo $data['username']; ?></h5>
          <h5 class="h5 article-title">Time: <?php echo date('d M, Y' , strtotime($data['updated_at'])); ?></h5>
          <hr>
            <pre>
              <?php echo $data['content']; ?>
            </pre>
        </div>
        <div class="comment-box bg-white p-20 rounded">
          <div>
              <div class="like-share row justify-content-center">
                  <button class="btn btn-primary col-md-5"><i class="fas fa-thumbs-up"></i> Like</button>
                  <button class="btn btn-success col-md-5"><i class="fas fa-share"></i> Share</button>
              </div>

              <form action="{{ BASE_URL }}comment" method="POST" class="mx-3 mt-2" id="cmtForm">
                  @csrf
                  <input type="hidden" name="article_id" value="<?php echo $data['id']; ?>">
                  <div class="form-group">
                      <label for="" class="text-dark">Comment:</label>
                      <input type="text" class="form-control" name="content" id="comment"
                          placeholder="Comment here...">
                  </div>

                  @php session_start() @endphp

                  @if (isset($_SESSION['user']))
                      <button type="submit" name="cmt-btn" class="btn btn-outline-success">Submit</button>
                  @else
                      <a class="btn btn-danger" href="{{ BASE_URL }}show_login">Login to comment</a>
                  @endif

              </form>
          </div>

          <div class="mt-3 overflow-auto" id="cmt-list" style="height: 100vh">

              @foreach ($comments as $comment)
                  <div class="container">
                      <div class="message-item">
                          <div class="message-header">
                              <img src="https://via.placeholder.com/50" alt="User Avatar"
                                  class="message-avatar">
                              <div class="message-username">{{ $comment['username'] }}</div>
                              <div class="message-time">{{ $comment['created_at'] }}</div>
                          </div>
                          <div class="message-content">
                              {{ $comment['content'] }}
                          </div>
                          <div class="message-actions">
                              <button class="btn btn-primary btn-sm"><i class="fas fa-thumbs-up"></i>
                                  Like</button>
                              <button class="btn btn-secondary btn-sm"><i class="fas fa-reply"></i>
                                  Reply</button>
                          </div>
                      </div>
                  </div>
              @endforeach

          </div>
      </div>

  </div>
</div>
</div>
</div>
@endsection

@section('script')

@endsection

