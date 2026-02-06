<?php
/**
 * Script untuk membuat symbolic link storage secara manual
 * Jalankan sekali di hosting: https://domain-anda.com/linkstorage.php
 * Hapus file ini setelah berhasil!
 */

$targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/../storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';

// Cek apakah folder target ada
if (!file_exists($targetFolder)) {
    // Coba path alternatif (jika public adalah root)
    $targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage/app/public';
}

// Jika link sudah ada, hapus dulu
if (is_link($linkFolder)) {
    unlink($linkFolder);
    echo "Link lama dihapus.<br>";
}

// Jika folder biasa, rename
if (is_dir($linkFolder) && !is_link($linkFolder)) {
    rename($linkFolder, $linkFolder . '_backup_' . time());
    echo "Folder storage lama di-backup.<br>";
}

// Buat symbolic link
if (symlink($targetFolder, $linkFolder)) {
    echo "✅ Symbolic link berhasil dibuat!<br>";
    echo "Target: " . $targetFolder . "<br>";
    echo "Link: " . $linkFolder . "<br>";
    echo "<br><strong>⚠️ HAPUS FILE INI SEKARANG!</strong>";
} else {
    echo "❌ Gagal membuat symbolic link.<br>";
    echo "Coba solusi alternatif: copy folder storage/app/public ke public/storage secara manual.<br>";
    echo "<br>Atau gunakan .htaccess redirect.";
}
