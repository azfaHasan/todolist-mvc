<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">To-Do List</h1>

    <a href="index.php?action=add" class="btn btn-primary mb-3">Tambah Tugas</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tugas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($tasks)) : ?>
                <?php $i = 1; foreach ($tasks as $task) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($task['task']) ?></td>
                        <td>
                            <?php if ($task['status'] == 'pending') : ?>
                                <span class="badge bg-warning text-dark">Pending</span>
                            <?php else : ?>
                                <span class="badge bg-success">Completed</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($task['status'] == 'pending') : ?>
                                <a href="index.php?action=updateStatus&id=<?= $task['id'] ?>" class="btn btn-success btn-sm">Selesaikan</a>
                            <?php endif; ?>
                            <a href="index.php?action=delete&id=<?= $task['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus tugas ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4" class="text-center">Belum ada tugas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
