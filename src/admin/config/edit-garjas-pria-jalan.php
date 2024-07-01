<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idGarjasPriaTesJalan = $_POST['ID_Jalan_Pria'] ?? '';
    $nipPengguna = $_POST['NIP_Pengguna'] ?? '';
    $waktuTestJalanPria = $_POST['Waktu_Jalan_Pria'] ?? '';
    $tanggalPelaksanaanTestJalanPria = $_POST['Tanggal_Pelaksanaan_Tes_Jalan_Pria'] ?? '';

    $garjasPriaTesJalanModel = new TesJalanKaki5KMPria($koneksi);
    $umurPengguna = $garjasPriaTesJalanModel->ambilUmurTesJalanKaki5KMPriaOlehNIP($nipPengguna);


    if ($waktuTestJalanPria == 0) {
        echo json_encode(array("success" => false, "message" => "Nilai Tes Jalan Pria tidak boleh 0."));
        exit;
    }

    $nilaiJalan = [
        'under_25' => [
            '17' => 100, '17.1' => 99, '17.2' => 99, '17.3' => 99, '17.4' => 98,
            '17.5' => 98, '17.6' => 98, '17.7' => 98, '17.8' => 98, '17.9' => 98,
            '18' => 98, '18.1' => 98, '18.2' => 97, '18.3' => 97, '18.4' => 97,
            '18.5' => 96, '18.6' => 96, '18.7' => 96, '18.8' => 96, '18.9' => 96,
            '19' => 96, '19.1' => 96, '19.2' => 95, '19.3' => 95, '19.4' => 95,
            '19.5' => 94, '19.6' => 94, '19.7' => 94, '19.8' => 94, '19.9' => 94,
            '20' => 94, '20.1' => 94, '20.2' => 93, '20.3' => 93, '20.4' => 93,
            '20.5' => 93,'21' => 92, '21.1' => 92, '21.2' => 92, '21.3' => 92, '21.4' => 91,
            '21.5' => 91, '21.6' => 91, '21.7' => 91, '21.8' => 91, '21.9' => 91,
            '22' => 91, '22.1' => 90, '22.2' => 90, '22.3' => 90, '22.4' => 89,
            '22.5' => 89, '22.6' => 89, '22.7' => 89, '22.8' => 89, '22.9' => 89,
            '23' => 89, '23.1' => 89, '23.2' => 88, '23.3' => 88, '23.4' => 88,
            '23.5' => 87, '23.6' => 87, '23.7' => 87, '23.8' => 87, '23.9' => 87,
            '24' => 87, '24.1' => 87, '24.2' => 86, '24.3' => 86, '24.4' => 86,
            '24.5' => 85, '24.6' => 85, '24.7' => 85, '24.8' => 85, '24.9' => 85,
            '25' => 85, '25.1' => 85, '25.2' => 85, '25.3' => 84, '25.4' => 84,
            '25.5' => 84, '26' => 83, '26.1' => 83, '26.2' => 83, '26.3' => 82,
            '26.4' => 82, '26.5' => 82, '27' => 81, '27.1' => 81, '27.2' => 81,
            '27.3' => 80, '27.4' => 80, '27.5' => 80, '28' => 80, '28.1' => 79,
            '28.2' => 79, '28.3' => 79, '28.4' => 79, '28.5' => 78, '29' => 78,
            '29.1' => 77, '29.2' => 77, '29.3' => 77, '29.4' => 76, '29.5' => 76,
            '30' => 76, '30.1' => 76, '30.2' => 75, '30.3' => 75, '30.4' => 75,
            '30.5' => 74, '30.6' => 74, '30.7' => 74, '30.8' => 74, '30.9' => 74,
            '31' => 74, '31.1' => 74, '31.2' => 73, '31.3' => 73, '31.4' => 73,
            '31.5' => 72, '31.6' => 72, '31.7' => 72, '31.8' => 72, '31.9' => 72,
            '32' => 72, '32.1' => 72, '32.2' => 72, '32.3' => 71, '32.4' => 71,
            '32.5' => 71, '33' => 70, '33.1' => 70, '33.2' => 70, '33.3' => 69,
            '33.4' => 69, '33.5' => 69, '34' => 68, '34.1' => 68, '34.2' => 68,
            '34.3' => 67, '34.4' => 67, '34.5' => 67, '35' => 67, '35.1' => 66,
            '35.2' => 66, '35.3' => 66, '35.4' => 65, '35.5' => 65, '35.6' => 65,
            '35.7' => 65, '35.8' => 65, '35.9' => 65, '36' => 65, '36.1' => 64,
            '36.2' => 64, '36.3' => 64, '36.4' => 64, '36.5' => 64, '36.6' => 63,
            '36.7' => 63, '36.8' => 63, '36.9' => 63, '37' => 63, '37.1' => 63,
            '37.2' => 62, '37.3' => 62, '37.4' => 62, '37.5' => 61, '37.6' => 61,
            '37.7' => 61, '37.8' => 61, '37.9' => 61, '38' => 61, '38.1' => 60,
            '38.2' => 60, '38.3' => 59, '38.4' => 58, '38.5' => 57, '38.6' => 57,
            '38.7' => 57, '38.8' => 57, '38.9' => 57, '39' => 57, '39.1' => 56,
            '39.2' => 55, '39.3' => 54, '39.4' => 54, '39.5' => 53, '40' => 52,
            '40.1' => 52, '40.2' => 51, '40.3' => 50, '40.4' => 49, '40.5' => 49,
            '41' => 48, '41.1' => 47, '41.2' => 47, '41.3' => 46, '41.4' => 45,
            '41.5' => 44, '41.6' => 44, '41.7' => 44, '41.8' => 44, '41.9' => 44,
            '42' => 44, '42.1' => 43, '42.2' => 42, '42.3' => 41, '42.4' => 41,
            '42.5' => 40, '43' => 39, '43.1' => 39, '43.2' => 38, '43.3' => 37,
            '43.4' => 36, '43.5' => 36, '44' => 35, '44.1' => 34, '44.2' => 34,
            '44.3' => 33, '44.4' => 32, '44.5' => 31, '44.6' => 31, '44.7' => 31,
            '44.8' => 31, '44.9' => 31, '45' => 31, '45.1' => 30, '45.2' => 29,
            '45.3' => 28, '45.4' => 28, '45.5' => 27, '46' => 26, '46.1' => 26,
            '46.2' => 25, '46.3' => 24, '46.4' => 23, '46.5' => 23, '47' => 22,
            '47.1' => 21, '47.2' => 21, '47.3' => 20, '47.4' => 19, '47.5' => 18,
            '47.6' => 18, '47.7' => 18, '47.8' => 18, '47.9' => 18, '48' => 18,
            '48.1' => 17, '48.2' => 16, '48.3' => 15, '48.4' => 15, '48.5' => 14,
            '49' => 13, '49.1' => 13, '49.2' => 12, '49.3' => 11, '49.4' => 10,
            '49.5' => 10, '50' => 9, '50.1' => 9, '50.2' => 9, '50.3' => 7,
            '50.4' => 6, '50.5' => 6, '50.6' => 5, '50.7' => 5, '50.8' => 5,
            '50.9' => 5, '51' => 5, '51.1' => 4, '51.2' => 3, '51.3' => 2,
            '51.4' => 2, '51.5' => 1
        ],
        '25-34' => [
    '19' => 100, '19.1' => 99, '19.2' => 99, '19.3' => 99,
    '19.4' => 99, '19.5' => 99, '20' => 99, '20.1' => 99,
    '20.2' => 97, '20.3' => 97, '20.4' => 97,
    '20.5' => 96,'20.6' => 96, '20.7' => 96, '20.8' => 96, '20.9' => 96, '21' => 96, '21.1' => 96,
    '21.2' => 95, '21.3' => 95, '21.4' => 95,
    '21.5' => 94, '21.6' => 94, '21.7' => 94, '21.8' => 94, '21.9' => 94, '22' => 94, '22.1' => 94,
    '22.2' => 93, '22.3' => 93, '22.4' => 93, '22.5' => 93, 
    '23' => 92, '23.1' => 92, '23.2' => 92,'23.3' => 92,
    '23.4' => 91, '23.5' => 91, '23.6' => 91, '23.7' => 91, '23.8' => 91, '23.9' => 91, '24' => 91,
    '24.1' => 90, '24.2' => 90, '24.3' => 90,
    '24.4' => 89, '24.5' => 89, '24.6' => 89, '24.7' => 89, '24.8' => 89, '24.9' => 89, '25' => 89, '25.1' => 89,
    '25.2' => 88, '25.3' => 88, '25.4' => 88,
    '25.5' => 87, '25.6' => 87, '25.7' => 87, '25.8' => 87, '25.9' => 87, '26' => 87, '26.1' => 87,
    '26.2' => 86, '26.3' => 86, '26.4' => 86,
    '26.5' => 85, '26.6' => 85, '26.7' => 85, '26.8' => 85, '26.9' => 85, '27' => 85, '27.1' => 85,
    '27.3' => 84, '27.4' => 84, '27.5' => 84,
    '28' => 83, '28.1' => 83, '28.2' => 83,
    '28.3' => 82, '28.4' => 82, '28.5' => 82, '28.6' => 82, '28.7' => 82, '28.8' => 82, '28.9' => 82,
    '29' => 81, '29.1' => 81, '29.2' => 81,
    '29.3' => 80, '29.4' => 80, '29.5' => 80, '29.6' => 80, '29.7' => 80, '29.8' => 80, '29.9' => 80, '30' => 80, '30.1' =>79,
    '30.2' => 79, '30.3' => 79, '30.4' => 78, '30.5' => 78, '30.6' => 78, '30.7' => 78, '30.8' => 78, '30.9' => 78,
    '31' => 78, '31.1' => 77, '31.2' => 77, '31.3' => 77,
    '31.4' => 76, '31.5' => 76, '31.6' => 76, '31.7' => 76, '31.8' => 76, '31.9' => 76, '32' => 76, '32.1' => 76,
    '32.2' => 75, '32.3' => 75, '32.4' => 75,
    '32.5' => 74, '32.6' => 74, '32.7' => 74, '32.8' => 74, '32.9' => 74, '33' => 74, '33.1' => 74,
    '33.2' => 73, '33.3' => 73, '33.4' => 73,
    '33.5' => 72, '34' => 72, '34.1' => 72, '34.2' => 72,
    '34.3' => 71, '34.4' => 71, '34.5' => 71,
    '35' => 70, '35.1' => 70, '35.2' => 70,
    '35.3' => 69, '35.4' => 69, '35.5' => 69,
    '36' => 68, '36.1' => 68, '36.2' => 68,
    '36.3' => 67, '36.4' => 67, '36.5' => 67, '36.6' => 67, '36.7' => 67, '36.8' => 67, '36.9' => 67, '37' => 67, '37.1' => 66,
    '37.2' => 66, '37.3' => 66, '37.4' => 65, '37.5' => 65, '37.6' => 65, '37.7' => 65, '37.8' => 65, '37.9' => 65,
    '38' => 65, '38.1' => 64, '38.2' => 64,
    '38.3' => 64, '38.4' => 63, '38.5' => 63, '38.6' => 63, '38.7' => 63, '38.8' => 63, '38.9' => 63,
    '39' => 63, '39.1' => 63, '39.2' => 62,
    '39.3' => 62, '39.4' => 62, '39.5' => 61, '39.6' => 61, '39.7' => 61, '39.8' => 61, '39.9' => 61,
    '40' => 61, '40.1' => 60, '40.2' => 60,
    '40.3' => 59, '40.4' => 58, '40.5' => 57, '40.6' => 57, '40.7' => 57, '40.8' => 57, '40.9' => 57,
    '41' => 57, '41.1' => 56, '41.2' => 55,
    '41.3' => 54, '41.4' => 54, '41.5' => 53,
    '42' => 52, '42.1' => 52, '42.2' => 51,
    '42.3' => 50, '42.4' => 59, '42.5' => 59,
    '43' => 58, '43.1' => 47, '43.2' => 47,
    '43.3' => 46, '43.4' => 45, '43.5' => 44, '43.6' => 44, '43.7' => 44, '43.8' => 44, '43.9' => 44,
    '44' => 43, '44.1' => 43, '44.2' => 41,
    '44.3' => 41, '44.4' => 41, '44.5' => 40,
    '45' => 39, '45.1' => 39, '45.2' => 38,
    '45.3' => 37, '45.4' => 36, '45.5' => 36, '45.6' => 36, '45.7' => 36, '45.8' => 36, '45.9' => 36,
    '46' => 35, '46.1' => 34, '46.2' => 34,
    '46.3' => 33, '46.4' => 32, '46.5' => 31, '46.6' => 31, '46.7' => 31, '46.8' => 31, '46.9' => 31,
    '47' => 31, '47.1' => 30, '47.2' => 29,
    '47.3' => 28, '47.4' => 28, '47.5' => 27,
    '48' => 26, '48.1' => 26, '48.2' => 25,
    '48.3' => 24, '48.4' => 23, '48.5' => 23,
    '49' => 22, '49.1' => 21, '49.2' => 21,
    '49.3' => 20, '49.4' => 19, '49.5' => 18, '49.6' => 18, '49.7' => 18, '49.8' => 18, '49.9' => 18,
    '50' => 18, '50.1' => 17, '50.2' => 16,
    '50.3' => 15, '50.4' => 15, '50.5' => 14,
    '51' => 13, '51.1' => 13, '51.2' => 12,
    '51.3' => 11, '51.4' => 10, '51.5' => 10,
    '52' => 9, '52.1' => 8, '52.2' => 8,
    '52.3' => 7, '52.4' => 6, '52.5' => 5, '52.6' => 5, '52.7' => 5, '52.8' => 5, '52.9' => 5,
    '53' => 5, '53.1' => 4, '53.2' => 3,
    '53.3' => 2, '53.4' => 2, '53.5' => 1,
],
        '35-44' => [
        '21' => 100, '21.1' => 99, '21.2' => 99, '21.3' => 99, '21.4' => 98,
        '21.5' => 98, '21.6' => 98, '21.7' => 98, '21.8' => 98, '21.9' => 98,
        '22' => 98, '22.1' => 98, '22.2' => 97, '22.3' => 97, '22.4' => 97,
        '22.5' => 96, '22.6' => 96, '22.7' => 96, '22.8' => 96, '22.9' => 96,
        '23' => 96, '23.1' => 96, '23.2' => 95, '23.3' => 95, '23.4' => 95,
        '23.5' => 94, '23.6' => 94, '23.7' => 94, '23.8' => 94, '23.9' => 94,
        '24' => 94, '24.1' => 94, '24.2' => 93, '24.3' => 93, '24.4' => 93,
        '24.5' => 93, '25' => 92, '25.1' => 92, '25.2' => 92, '25.3' => 92,
        '25.4' => 91, '25.5' => 91, '25.6' => 91, '25.7' => 91, '25.8' => 91,
        '25.9' => 91, '26' => 91, '26.1' => 90, '26.2' => 90, '26.3' => 90,
        '26.4' => 89, '26.5' => 89, '26.6' => 89, '26.7' => 89, '26.8' => 89,
        '26.9' => 89, '27' => 89, '27.1' => 89, '27.2' => 88, '27.3' => 88,
        '27.4' => 88, '27.5' => 87, '27.6' => 87, '27.7' => 87, '27.8' => 87,
        '27.9' => 87, '28' => 87, '28.1' => 87, '28.2' => 86, '28.3' => 86,
        '28.4' => 86, '28.5' => 85, '28.6' => 85, '28.7' => 85, '28.8' => 85,
        '28.9' => 85, '29' => 85, '29.1' => 85, '29.2' => 85, '29.3' => 84,
        '29.4' => 84, '29.5' => 84, '30' => 83, '30.1' => 83, '30.2' => 83,
        '30.3' => 82, '30.4' => 82, '30.5' => 82, '31' => 81, '31.1' => 81,
        '31.2' => 81, '31.3' => 80, '31.4' => 80, '31.5' => 80, '31.6' => 80,
        '31.7' => 80, '31.8' => 80, '31.9' => 80, '32' => 79, '32.1' => 79,
        '32.2' => 79, '32.3' => 79, '32.4' => 78, '32.5' => 78, '32.6' => 78,
        '32.7' => 78, '32.8' => 78, '32.9' => 78, '33' => 78, '33.1' => 77,
        '33.2' => 77, '33.3' => 77, '33.4' => 76, '33.5' => 76, '33.6' => 76,
        '33.7' => 76, '33.8' => 76, '33.9' => 76, '34' => 76, '34.1' => 76,
        '34.2' => 75, '34.3' => 75, '34.4' => 75, '34.5' => 74, '34.6' => 74,
        '34.7' => 74, '34.8' => 74, '34.9' => 74, '35' => 74, '35.1' => 74,
        '35.2' => 73, '35.3' => 73, '35.4' => 73, '35.5' => 72, '35.6' => 72,
        '35.7' => 72, '35.8' => 72, '35.9' => 72, '36' => 72, '36.1' => 72,
        '36.2' => 72, '36.3' => 71, '36.4' => 71, '36.5' => 71, '37' => 70,
        '37.1' => 70, '37.2' => 70, '37.3' => 69, '37.4' => 69, '37.5' => 69,
        '38' => 68, '38.1' => 68, '38.2' => 68, '38.3' => 67, '38.4' => 67,
        '38.5' => 67, '38.6' => 67, '38.7' => 67, '38.8' => 67, '38.9' => 67,
        '39' => 67, '39.1' => 66, '39.2' => 66, '39.3' => 66, '39.4' => 65,
        '39.5' => 65, '39.6' => 65, '39.7' => 65, '39.8' => 65, '39.9' => 65,
        '40' => 65, '40.1' => 64, '40.2' => 64, '40.3' => 64, '40.4' => 63,
        '40.5' => 63, '40.6' => 63, '40.7' => 63, '40.8' => 63, '40.9' => 63,
        '41' => 63, '41.1' => 63, '41.2' => 62, '41.3' => 62, '41.4' => 62,
        '41.5' => 61, '41.6' => 61, '41.7' => 61, '41.8' => 61, '41.9' => 61,
        '42' => 61, '42.1' => 60, '42.2' => 60, '42.3' => 59, '42.4' => 58,
        '42.5' => 57, '42.6' => 57, '42.7' => 57, '42.8' => 57, '42.9' => 57,
        '43' => 57, '43.1' => 56, '43.2' => 55, '43.3' => 54, '43.4' => 54,
        '43.5' => 53, '43.6' => 53, '43.7' => 53, '43.8' => 53, '43.9' => 53,
        '44' => 52, '44.1' => 52, '44.2' => 51, '44.3' => 50, '44.4' => 49,
        '44.5' => 49, '44.6' => 49, '44.7' => 49, '44.8' => 49, '44.9' => 49,
        '45' => 48, '45.1' => 47, '45.2' => 47, '45.3' => 46, '45.4' => 45,
        '45.5' => 44, '45.6' => 44, '45.7' => 44, '45.8' => 44, '45.9' => 44,
        '46' => 44, '46.1' => 43, '46.2' => 42, '46.3' => 41, '46.4' => 41,
        '46.5' => 40, '46.6' => 40, '46.7' => 40, '46.8' => 40, '46.9' => 40,
        '47' => 39, '47.1' => 39, '47.2' => 38, '47.3' => 37, '47.4' => 36,
        '47.5' => 36, '47.6' => 36, '47.7' => 36, '47.8' => 36, '47.9' => 36,
        '48' => 35, '48.1' => 34, '48.2' => 34, '48.3' => 33, '48.4' => 32,
        '48.5' => 31, '48.6' => 31, '48.7' => 31, '48.8' => 31, '48.9' => 31,
        '49' => 31, '49.1' => 30, '49.2' => 29, '49.3' => 28, '49.4' => 28,
        '49.5' => 27, '49.6' => 27, '49.7' => 27, '49.8' => 27, '49.9' => 27,
        '50' => 26, '50.1' => 26, '50.2' => 25, '50.3' => 24, '50.4' => 23,
        '50.5' => 23, '50.6' => 23, '50.7' => 23, '50.8' => 23, '50.9' => 23,
        '51' => 22, '51.1' => 21, '51.2' => 21, '51.3' => 20, '51.4' => 19,
        '51.5' => 18, '51.6' => 18, '51.7' => 18, '51.8' => 18, '51.9' => 18,
        '52' => 18, '52.1' => 17, '52.2' => 16, '52.3' => 15, '52.4' => 15,
        '52.5' => 14, '52.6' => 14, '52.7' => 14, '52.8' => 14, '52.9' => 14,
        '53' => 13, '53.1' => 13, '53.2' => 12, '53.3' => 11, '53.4' => 10,
        '53.5' => 10, '53.6' => 10, '53.7' => 10, '53.8' => 10, '53.9' => 10,
        '54' => 9, '54.1' => 8, '54.2' => 8, '54.3' => 7, '54.4' => 6,
        '54.5' => 5, '54.6' => 5, '54.7' => 5, '54.8' => 5, '54.9' => 5,
        '55' => 5, '55.1' => 4, '55.2' => 3, '55.3' => 2, '55.4' => 2,
        '55.5' => 1,
    ],
       '45-54' => [
    '23' => 100, '23.1' => 99, '23.2' => 99, '23.3' => 99, '23.4' => 98,
    '23.5' => 98, '23.6' => 98, '23.7' => 98, '23.8' => 98, '23.9' => 98,
    '24' => 98, '24.1' => 98, '24.2' => 97, '24.3' => 97, '24.4' => 97,
    '24.5' => 96, '24.6' => 96, '24.7' => 96, '24.8' => 96, '24.9' => 96,
    '25' => 96, '25.1' => 96, '25.2' => 95, '25.3' => 95, '25.4' => 95,
    '25.5' => 94, '25.6' => 94, '25.7' => 94, '25.8' => 94, '25.9' => 94,
    '26' => 94, '26.1' => 94, '26.2' => 93, '26.3' => 93, '26.4' => 93,
    '26.5' => 93, '27' => 92, '27.1' => 92, '27.2' => 92, '27.3' => 92,
    '27.4' => 91, '27.5' => 91, '27.6' => 91, '27.7' => 91, '27.8' => 91,
    '27.9' => 91, '28' => 91, '28.1' => 90, '28.2' => 90, '28.3' => 90,
    '28.4' => 89, '28.5' => 89, '28.6' => 89, '28.7' => 89, '28.8' => 89,
    '28.9' => 89, '29' => 89, '29.1' => 89, '29.2' => 88, '29.3' => 88,
    '29.4' => 88, '29.5' => 87, '29.6' => 87, '29.7' => 87, '29.8' => 87,
    '29.9' => 87, '30' => 87, '30.1' => 87, '30.2' => 86, '30.3' => 86,
    '30.4' => 86, '30.5' => 85, '30.6' => 85, '30.7' => 85, '30.8' => 85,
    '30.9' => 85, '31' => 85, '31.1' => 85, '31.2' => 85, '31.3' => 84,
    '31.4' => 84, '31.5' => 84, '32' => 83, '32.1' => 83, '32.2' => 83,
    '32.3' => 82, '32.4' => 82, '32.5' => 82, '33' => 81, '33.1' => 81,
    '33.2' => 81, '33.3' => 80, '33.4' => 80, '33.5' => 80, '34' => 80,
    '34.1' => 79, '34.2' => 79, '34.3' => 79, '34.4' => 78, '34.5' => 78,
    '34.6' => 78, '34.7' => 78, '34.8' => 78, '34.9' => 78, '35' => 78,
    '35.1' => 77, '35.2' => 77, '35.3' => 77, '35.4' => 76, '35.5' => 76,
    '35.6' => 76, '35.7' => 76, '35.8' => 76, '35.9' => 76, '36' => 76,
    '36.1' => 76, '36.2' => 75, '36.3' => 75, '36.4' => 75, '36.5' => 74,
    '36.6' => 74, '36.7' => 74, '36.8' => 74, '36.9' => 74, '37' => 74,
    '37.1' => 74, '37.2' => 73, '37.3' => 73, '37.4' => 73, '37.5' => 72,
    '37.6' => 72, '37.7' => 72, '37.8' => 72, '37.9' => 72, '38' => 72,
    '38.1' => 72, '38.2' => 71, '38.3' => 71, '38.4' => 71, '39' => 70,
    '39.1' => 70, '39.2' => 70, '39.3' => 69, '39.4' => 69, '39.5' => 69,
    '40' => 68, '40.1' => 68, '40.2' => 68, '40.3' => 67, '40.4' => 67,
    '40.5' => 67, '41' => 66, '41.1' => 66, '41.2' => 66, '41.3' => 65,
    '41.4' => 65, '41.5' => 65, '41.6' => 65, '41.7' => 65, '41.8' => 65,
    '41.9' => 65, '42' => 65, '42.1' => 64, '42.2' => 64, '42.3' => 64,
    '42.4' => 63, '42.5' => 63, '42.6' => 63, '42.7' => 63, '42.8' => 63,
    '42.9' => 63, '43' => 63, '43.1' => 62, '43.2' => 62, '43.3' => 62,
    '43.4' => 61, '43.5' => 61, '43.6' => 61, '43.7' => 61, '43.8' => 61,
    '43.9' => 61, '44' => 61, '44.1' => 60, '44.2' => 60, '44.3' => 59,
    '44.4' => 58, '44.5' => 57, '44.6' => 57, '44.7' => 57, '44.8' => 57,
    '44.9' => 57, '45' => 57, '45.1' => 56, '45.2' => 55, '45.3' => 54,
    '45.4' => 54, '45.5' => 53, '46' => 52, '46.1' => 52, '46.2' => 51,
    '46.3' => 50, '46.4' => 49, '46.5' => 49, '47' => 48, '47.1' => 47,
    '47.2' => 47, '47.3' => 46, '47.4' => 45, '47.5' => 44, '48' => 44,
    '48.1' => 43, '48.2' => 42, '48.3' => 41, '48.4' => 41, '48.5' => 40,
    '49' => 39, '49.1' => 39, '49.2' => 38, '49.3' => 37, '49.4' => 36,
    '49.5' => 36, '50' => 35, '50.1' => 34, '50.2' => 34, '50.3' => 33,
    '50.4' => 32, '50.5' => 31, '51' => 31, '51.1' => 30, '51.2' => 29,
    '51.3' => 28, '51.4' => 28, '51.5' => 27, '52' => 26, '52.1' => 26,
    '52.2' => 25, '52.3' => 24, '52.4' => 23, '53' => 22, '53.1' => 21,
    '53.2' => 21, '53.3' => 20, '53.4' => 19, '53.5' => 18, '54' => 18,
    '54.1' => 17, '54.2' => 16, '54.3' => 15, '54.4' => 15, '54.5' => 14,
    '55' => 13, '55.1' => 13, '55.2' => 12, '55.3' => 11, '55.4' => 10,
    '55.5' => 10, '55.6' => 10, '55.7' => 10, '55.8' => 10, '55.9' => 10,
    '56' => 9, '56.1' => 8, '56.2' => 8, '56.3' => 7, '56.4' => 6,
    '56.5' => 5, '57' => 5, '57.1' => 4, '57.2' => 3, '57.3' => 2,
    '57.4' => 2, '57.5' => 1,
],
        '55-59' => [
    '25' => 100,
    '25.1' => 99, '25.2' => 99, '25.3' => 99,
    '25.4' => 98, '25.5' => 98, '25.6' => 98, '25.7' => 98, '25.8' => 98, '25.9' => 98, '26' => 98, '26.1' => 98,
    '26.2' => 97, '26.3' => 97, '26.4' => 97,
    '26.5' => 96, '26.6' => 96, '26.7' => 96, '26.8' => 96, '26.9' => 96, '27' => 96, '27.1' => 96,
    '27.2' => 94, '27.3' => 94, '27.4' => 94, '27.5' => 94,
    '28' => 92, '28.1' => 92, '28.2' => 92, '28.3' => 92,
    '28.4' => 91, '28.5' => 91, '28.6' => 91, '28.7' => 91, '28.8' => 91, '28.9' => 91, '29' => 91,
    '29.1' => 90, '29.2' => 90, '29.3' => 90,
    '29.4' => 89, '29.5' => 89, '29.6' => 89, '29.7' => 89, '29.8' => 89, '29.9' => 89, '30' => 89, '30.1' => 89,
    '30.2' => 88, '30.3' => 88, '30.4' => 88, '30.5' => 88, '30.6' => 88, '30.7' => 88, '30.8' => 88, '30.9' => 88, '31' => 88, '31.1' => 88, '31.2' => 88, '31.3' => 88, '31.4' => 88,
    '31.5' => 87, '31.6' => 87, '31.7' => 87, '31.8' => 87, '31.9' => 87, '32' => 87, '32.1' => 87,
    '32.2' => 86, '32.3' => 86, '32.4' => 86,
    '32.5' => 85, '32.6' => 85, '32.7' => 85, '32.8' => 85, '32.9' => 85, '33' => 85, '33.1' => 85, '33.2' => 85,
    '33.3' => 84, '33.4' => 84, '33.5' => 84,
    '34' => 83, '34.1' => 83, '34.2' => 83,
    '34.3' => 82, '34.4' => 82, '34.5' => 82,
    '35' => 81, '35.1' => 81, '35.2' => 81,
    '35.3' => 80, '35.4' => 80, '35.5' => 80, '35.6' => 80, '35.7' => 80, '35.8' => 80, '35.9' => 80, '36' => 80,
    '36.1' => 79, '36.2' => 79, '36.3' => 79,
    '36.4' => 78, '36.5' => 78, '36.6' => 78, '36.7' => 78, '36.8' => 78, '36.9' => 78, '37' => 78,
    '37.1' => 77, '37.2' => 77, '37.3' => 77,
    '37.4' => 76, '37.5' => 76, '37.6' => 76, '37.7' => 76, '37.8' => 76, '37.9' => 76, '38' => 76, '38.1' => 76,
    '38.2' => 75, '38.3' => 75, '38.4' => 75,
    '38.5' => 74, '38.6' => 74, '38.7' => 74, '38.8' => 74, '38.9' => 74, '39' => 74, '39.1' => 74,
    '39.2' => 73, '39.3' => 73, '39.4' => 73,
    '39.5' => 72, '39.6' => 72, '39.7' => 72, '39.8' => 72, '39.9' => 72, '40' => 72, '40.1' => 72, '40.2' => 72,
    '40.3' => 71, '40.4' => 71, '40.5' => 71,
    '41' => 70, '41.1' => 70, '41.2' => 70,
    '41.3' => 69, '41.4' => 69, '41.5' => 69,
    '42' => 68, '42.1' => 68, '42.2' => 68,
    '42.3' => 67, '42.4' => 67, '42.5' => 67, '42.6' => 67, '42.7' => 67, '42.8' => 67, '42.9' => 67, '43' => 67,
    '43.1' => 66, '43.2' => 66, '43.3' => 66,
    '43.4' => 65, '43.5' => 65, '43.6' => 65, '43.7' => 65, '43.8' => 65, '43.9' => 65, '44' => 65,
    '44.1' => 64, '44.2' => 64, '44.3' => 64,
    '44.4' => 63, '44.5' => 63, '44.6' => 63, '44.7' => 63, '44.8' => 63, '44.9' => 63, '45' => 63, '45.1' => 63,
    '45.2' => 62, '45.3' => 62, '45.4' => 62,
    '45.5' => 61, '45.6' => 61, '45.7' => 61, '45.8' => 61, '45.9' => 61, '46' => 61,
    '46.1' => 60, '46.2' => 60,
    '46.3' => 59,
    '46.4' => 58,
    '46.5' => 57, '46.6' => 57, '46.7' => 57, '46.8' => 57, '46.9' => 57, '47' => 57,
    '47.1' => 56,
    '47.2' => 55,
    '47.3' => 54, '47.4' => 54,
    '47.5' => 53,
    '48' => 52, '48.1' => 52,
    '48.2' => 51,
    '48.3' => 50,
    '48.4' => 49, '48.5' => 49,
    '49' => 48,
    '49.1' => 47, '49.2' => 47,
    '49.3' => 46,
    '49.4' => 45,
    '49.5' => 44, '49.6' => 44, '49.7' => 44, '49.8' => 44, '49.9' => 44, '50' => 44,
    '50.1' => 43,
    '50.2' => 42, '50.3' => 42,
    '50.4' => 41,
    '50.5' => 40,
    '51' => 39, '51.1' => 39,
    '51.2' => 38,
    '51.3' => 37,
    '51.4' => 36, '51.5' => 36,
    '52' => 35,
    '52.1' => 34, '52.2' => 34,
    '52.3' => 33,
    '52.4' => 32,
    '52.5' => 31, '52.6' => 31, '52.7' => 31, '52.8' => 31, '52.9' => 31, '53' => 31,
    '53.1' => 30,
    '53.2' => 29,
    '53.3' => 28, '53.4' => 28,
    '53.5' => 27,
    '54' => 26, '54.1' => 26,
    '54.2' => 25,
    '54.3' => 24,
    '54.4' => 23, '54.5' => 23,
    '55' => 22,
    '55.1' => 21, '55.2' => 21,
    '55.3' => 20,
    '55.4' => 19,
    '55.5' => 18, '55.6' => 18, '55.7' => 18, '55.8' => 18, '55.9' => 18, '56' => 18,
    '56.1' => 17,
    '56.2' => 16,
    '56.3' => 15, '56.4' => 15,
    '56.5' => 14,
    '57' => 13, '57.1' => 13,
    '57.2' => 12,
    '57.3' => 11,
    '57.4' => 10, '57.5' => 10,
    '58' => 9,
    '58.1' => 8, '58.2' => 8,
    '58.3' => 7,
    '58.4' => 6,
    '58.5' => 5, '58.6' => 5, '58.7' => 5, '58.8' => 5, '58.9' => 5, '59' => 5,
    '59.1' => 4,
    '59.2' => 3,
    '59.3' => 2, '59.4' => 2, '59.5' => 1
]
    ];


    $nilaiAkhir = 0;

    if ($umurPengguna < 25) {
        if ($waktuTestJalanPria < 17) {
            $nilaiAkhir = 100;
        } elseif ($waktuTestJalanPria > 51.1) {
            $nilaiAkhir = 1;
        } else {
            $nilaiAkhir = isset($nilaiJalan['under_25'][(string)$waktuTestJalanPria]) ? $nilaiJalan['under_25'][(string)$waktuTestJalanPria] : 0;
        }
    } elseif ($umurPengguna >= 25 && $umurPengguna <= 34) {
        if ($waktuTestJalanPria < 10.0) {
            $nilaiAkhir = 100;
        } elseif ($waktuTestJalanPria > 24.5) {
            $nilaiAkhir = 1;
        } else {
            $nilaiAkhir = isset($nilaiJalan['25-34'][(string)$waktuTestJalanPria]) ? $nilaiJalan['25-34'][(string)$waktuTestJalanPria] : 0;
        }
    } elseif ($umurPengguna >= 35 && $umurPengguna <= 44) {
        if ($waktuTestJalanPria < 11.0) {
            $nilaiAkhir = 100;
        } elseif ($waktuTestJalanPria > 25.5) {
            $nilaiAkhir = 1;
        } else {
            $nilaiAkhir = isset($nilaiJalan['35-44'][(string)$waktuTestJalanPria]) ? $nilaiJalan['35-44'][(string)$waktuTestJalanPria] : 0;
        }
    } elseif ($umurPengguna >= 45 && $umurPengguna <= 54) {
        if ($waktuTestJalanPria < 12.0) {
            $nilaiAkhir = 100;
        } elseif ($waktuTestJalanPria > 27.5) {
            $nilaiAkhir = 1;
        } else {
            $nilaiAkhir = isset($nilaiJalan['45-54'][(string)$waktuTestJalanPria]) ? $nilaiJalan['45-54'][(string)$waktuTestJalanPria] : 0;
        }
    } elseif ($umurPengguna >= 55 && $umurPengguna <= 59) {
        if ($waktuTestJalanPria < 13.0) {
            $nilaiAkhir = 100;
        } elseif ($waktuTestJalanPria > 26.5) {
            $nilaiAkhir = 1;
        } else {
            $nilaiAkhir = isset($nilaiJalan['55-59'][(string)$waktuTestJalanPria]) ? $nilaiJalan['55-59'][(string)$waktuTestJalanPria] : 0;
        }
    }

    if (!$nilaiAkhir) {
        echo json_encode(array("success" => false, "message" => "Input waktu tidak valid untuk usia pengguna ini."));
        exit;
    }

    $dataGarjasWanitaShuttleRun = array(
        'NIP_Pengguna' => $nipPengguna,
        'Tanggal_Pelaksanaan_Tes_Jalan_Pria' => $tanggalPelaksanaanTestJalanPria,
        'Waktu_Jalan_Pria' => $waktuTestJalanPria,
        'Nilai_Jalan_Pria' => $nilaiAkhir
    );
    $updateGarjasPriaTesJalan = $garjasPriaTesJalanModel->perbaruiTesJalanPria($idGarjasPriaTesJalan, $dataGarjasWanitaShuttleRun);

    if ($updateGarjasPriaTesJalan) {
        echo json_encode(array("success" => true, "message" => "Data Garjas Pria Tes Jalan berhasil diperbarui."));
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data Garjas Pria Tes Jalan."));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
}
