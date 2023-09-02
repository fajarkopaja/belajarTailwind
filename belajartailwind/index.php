<?php

include_once('./Models/Student.php');

$students = Student::index();

if(isset($_POST['submit'])) {
  $response = Student::create([
    'name' => $_POST['name'],
    'nis' => $_POST['nis'],
    'id' => $_POST ['id'],
  ]);

  setcookie('message', $response, time() + 10);
  header("Location: index.php");
}

if(isset($_POST['delete'])) {
  $response = Student::delete($_POST['id']);

  setcookie('message', $response, time() + 10);
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Belajar Tailwind</title>
</head>
<body class="classranktailwind bg-gray-100">

    <header class="bg-blue-500 p-4">
        <h1 class="text-white text-2xl font-semibold">Class Rank Tailwind</h1>
    </header>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Class Ranks Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <nav class="p-4 shadow-xl mb-10 bg-white z-3 sticky top-0">
      <a class="flex justify-center items-center gap-1" href="">
        <h1 class="font-bold text-3xl m-0">SMKN 10 JKT</h1>
      </a>
    </nav>
    <div class="flex flex-col sm:flex-row">
      <div class="md:basis-2/5 lg:basis-1/4 m-5 p-7 bg-slate-100 rounded-lg shadow-xl">
        <form action="index.php" method="post">
          <h1 class="mb-3 text-center font-bold text-xl">XI RPL'56</h1>
          <hr class="border border-slate-600" />
          <h3 class="my-4 font-bold">Input Data</h3>
          <div class="mb-3">
            <label for="name"><span class="text-blue-500 font-bold">*</span> Nama</label>
            <input id="name" type="text" name="name" class="mt-1 py-1 px-2 border-2 border-blue-400 rounded-md w-full" placeholder="Masukkan Nama Siswa/i" required />
          </div>
          <div class="mb-5">
            <label for="nis"><span class="text-blue-500 font-bold">*</span> Nis</label>
            <input id="nis" type="number" name="nis" class="mt-1 py-1 px-2 border-2 border-blue-400 rounded-md w-full" placeholder="Masukkan nis Siswa/i" required />
          </div>
          <button class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-900 rounded" style="letter-spacing: 0.5px" type="submit" id="submit" name="submit">KIRIM</button>
        </form>
      </div>

      <div class="md:basis-3/5 lg:basis-3/4 m-5">
        <div class="bg-slate-100 rounded-lg p-5 shadow-xl">
          <h1 class="mb-5 text-center font-bold text-xl">Tabel Nilai Siswa</h1>
          <table class="w-full text-center">
            <thead class="bg-blue-600 text-white">
              <tr>
                <th class="border border-black">No</th>
                <th class="border border-black">Nama</th>
                <th class="border border-black">Nis</th>
                <th class="border border-black">Pilihan</th>
              </tr>
            </thead>
            <tbody>
                <table class="w-full">
                    <thead>
                        
                        
                    </thead>
                    <tbody class="text-center">
                      <?php foreach($students as $key => $student) : ?>
                        <tr class="border border-gray-700 bg-slate-100">
                            <td class="px-6 py-3"><?= $key + 1 ?></td>
                            <td class="text-left px-6 py-3"><?= $student['name'] ?></td>
                            <td class="px-6 py-3"><?= $student['nis'] ?></td>
                            <td class="px-6 py-3">
                              <a href="detail.php?id=<?= $student['id'] ?>" class="bg-blue-500 hover:bg-blue-600 p-2 rounded-lg text-white transition-all duration-200" >Detail</a>
                              <a href="edit.php?id=<?= $student['id'];
                              $student['name'];
                              $student['nis']; ?>
                              " class="bg-green-500 hover:bg-green-600 p-2 rounded-lg text-white transition-all duration-200">Edit</a>
                              <form action="" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                  <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                  <button name="delete" type="submit" class="bg-red-500 hover:bg-red-600 p-2 rounded-lg text-white transition-all duration-200">Hapus</button>
                              </form>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table> 
        </div>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="p-4 bg-blue-800 mb-0">
      <h1 class="flex justify-center items-center text-white text-lg" style="letter-spacing: 0">Copyright © MFI SMKN10</h1>
    </div>
  </body>
</html>