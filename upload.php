<?php
// cek apakah form telah di-submit
if(isset($_POST["submit"])) {
	// cek apakah file telah dipilih
	if(isset($_FILES["file"])) {
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);

		// cek apakah file dengan nama yang sama sudah ada
		if(file_exists($target_file)) {
			echo "Maaf, file tersebut sudah ada.";
		} else {
			// upload file
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
				// file berhasil diupload
				echo "File berhasil diupload.";

				// redirect ke halaman "view.html" dengan parameter nama file
				header("Location: view.html?file=" . urlencode(basename($_FILES["file"]["name"])));
				exit();
			} else {
				echo "Maaf, terjadi kesalahan saat mengupload file.";
			}
		}
	} else {
		echo "Maaf, file tidak ditemukan.";
	}
}
?>

