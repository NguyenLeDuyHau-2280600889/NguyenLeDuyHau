<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
    function validateForm() {
        let name = document.getElementById('name').value;
        let price = document.getElementById('price').value;
        let errors = [];
        if (name.length < 10 || name.length > 100) {
            errors.push('Tên sản phẩm phải có từ 10 đến 100 ký tự.');
        }
        if (price <= 0 || isNaN(price)) {
            errors.push('Giá phải là một số dương lớn hơn 0.');
        }
        if (errors.length > 0) {
            alert(errors.join('\n'));
            return false;
        }
        return true;
    }
    </script>
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4">Thêm sản phẩm mới</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="/hau/Product/add" onsubmit="return validateForm();">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" id="price" name="price" step="0.01" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
        <a href="/hau/Product/list" class="btn btn-secondary ms-2">Quay lại danh sách sản phẩm</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
