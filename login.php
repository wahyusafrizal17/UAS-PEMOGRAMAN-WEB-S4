<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                <?php if(isset($_SESSION['message'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <?php unset($_SESSION['message']) ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                    <div class="card">
                        <form action="pro-log.php" method="POST">
                            <div class="card-body">
                                <h4 class="text-center mb-2">LOGIN</h4>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="remember" id="agree-term" class="agree-term" />
                                    <label for="agree-term" class="label-agree-term"><span><span></span></span> Remember</label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Masuk</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
 </body>
</html>