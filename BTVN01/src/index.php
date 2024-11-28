<?php include '../employees/employees.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Manage Employees</h2>
            <div class="buttons">
                <button class="add-btn" onclick="showAddEmployeeForm()">Thêm Nhân Viên Mới</button>
            </div>
        </div>
        <table id="employeeTable">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (getEmployees() as $index => $employee): ?>
                <tr>
                    <td><?php echo htmlspecialchars($employee['name']); ?></td>
                    <td><?php echo htmlspecialchars($employee['email']); ?></td>
                    <td><?php echo htmlspecialchars($employee['address']); ?></td>
                    <td><?php echo htmlspecialchars($employee['phone']); ?></td>
                    <td>
                        <button class="edit-btn" onclick="showEditEmployeeForm(<?php echo $index; ?>)">✏️</button>
                        <button class="delete-btn" onclick="deleteEmployee(<?php echo $index; ?>)">🗑️</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div id="employeeModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <form id="employeeForm" onsubmit="return saveEmployee(event)">
                    <input type="hidden" id="employeeIndex" value="">
                    <label for="name">Tên:</label>
                    <input type="text" id="name" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" required>
                    <label for="address">Địa Chỉ:</label>
                    <input type="text" id="address" required>
                    <label for="phone">Số Điện Thoại:</label>
                    <input type="text" id="phone" required>
                    <button type="submit">Lưu</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../scripts.js"></script>
</body>
</html>
