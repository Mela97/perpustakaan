<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../login.php"); 
    exit();
}

$pdf_path = '';

if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];

    // Query untuk mendapatkan nama file PDF berdasarkan ID buku
    $query = "SELECT file_pdf FROM buku WHERE buku_id = $id_buku";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pdf_file = $row['file_pdf'];

        // Path menuju file PDF
        $pdf_path = '../proses/pdf/' . $pdf_file;
    } else {
        echo "Buku tidak ditemukan.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca Buku</title>
    <!-- Tambahkan link CSS untuk Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-8OcvMWCNph0YHxt3/0Z4sAUdGQOfnRV+B6rAhxQGb7QJeFz7DS1/HQ8ayS0H0s8rRj6EC3jGMO7R8Ntj0gGHQQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            /* Hindari scrollbar */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            /* Tambahkan */
        }

        #pdf-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            /* Tambahkan */
        }

        #pdf-controls2 button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            margin: 5px;
            /* Tambahkan */
        }

        #pdf-controls2 #back-icon {
            font-size: 24px;
            cursor: pointer;
            margin-left: 10px;
            /* Tambahkan */
        }

        #zoom-controls {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        #zoom-controls label {
            margin-right: 5px;
            top: 90px;
            /* Tambahkan */
        }

        #pdf-container {
            position: relative; /* Tambahkan */
            max-width: 100%;
            height: 80vh;
            /* Ganti dari 100vh menjadi 80vh */
            display: flex;
            justify-content: center;
            align-items: center;
            /* position: relative; */
            /* Tambahkan */
            /* Tambahkan margin bottom */
            margin-top: 30px;
            margin-bottom: 30px;
        }

        canvas {
            position: relative;
            left: 0; 
            width: 105%; 
            height: 110%; 
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div id="pdf-controls2">
        <div id="zoom-controls">
            <label for="zoom-slider">HD:</label>
            <input type="range" id="zoom-slider" min="0.5" max="2" step="0.1" value="1">
        </div>
        <div id="pdf-container">
            <canvas id="pdf-render"></canvas>
        </div>
    </div>
    <div id="pdf-controls">
        <div id="page-controls">
            <button id="prev-page">Prev</button>
            <button id="next-page">Next</button>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <script>
        let pdfInstance = null;
        let currentPage = 1;
        let numPages = 0;
        let zoomLevel = 1;

        function renderPage(pageNumber) {
            if (!pdfInstance) return;
            pdfInstance.getPage(pageNumber).then(function(page) {
                const viewport = page.getViewport({
                    scale: zoomLevel
                });
                const canvas = document.getElementById('pdf-render');
                const context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                const renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        }

        const pdfPath = '<?php echo $pdf_path; ?>';
        pdfjsLib.getDocument(pdfPath).promise.then(function(pdf) {
            pdfInstance = pdf;
            numPages = pdf.numPages;
            renderPage(currentPage);
        }).catch(function(error) {
            console.error('Error loading PDF:', error);
        });

        document.getElementById('prev-page').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                renderPage(currentPage);
            }
        });

        document.getElementById('next-page').addEventListener('click', function() {
            if (currentPage < numPages) {
                currentPage++;
                renderPage(currentPage);
            }
        });

        document.getElementById('zoom-slider').addEventListener('input', function() {
            zoomLevel = parseFloat(document.getElementById('zoom-slider').value);
            renderPage(currentPage);
        });
    </script>
</body>

</html>
