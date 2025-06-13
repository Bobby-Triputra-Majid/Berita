<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Orbitron', sans-serif;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .container {
            text-align: center;
            z-index: 1;
        }

        h1 {
            font-size: 8rem;
            color: #00f0ff;
            text-shadow: 0 0 20px #00f0ff;
            margin: 0;
        }

        h2 {
            font-size: 2rem;
            color: #ccc;
            margin: 1rem 0;
        }

        p {
            font-size: 1.2rem;
            color: #aaa;
            margin-bottom: 2rem;
        }

        a {
            text-decoration: none;
            background: transparent;
            border: 2px solid #00f0ff;
            color: #00f0ff;
            padding: 12px 24px;
            border-radius: 8px;
            transition: 0.3s;
            font-weight: bold;
        }

        a:hover {
            background-color: #00f0ff;
            color: #000;
            box-shadow: 0 0 15px #00f0ff;
        }

        .glow-circuit {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://i.ibb.co/7WRrz3q/circuit.png') center/cover no-repeat;
            opacity: 0.05;
            z-index: 0;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.4;
            }
        }

        .code-hint {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #555;
            font-family: monospace;
            animation: blink 2s infinite;
        }
    </style>
</head>

<body>
    <div class="glow-circuit"></div>
    <div class="container">
        <h1>404</h1>
        <h2>Data tidak ditemukan di sistem galaksi 🌌</h2>
        <p>Sepertinya halaman yang kamu cari tidak tersedia di dimensi ini.</p>
        <a href="?page=home">Kembali ke Beranda</a>
        <div class="code-hint">// Error: PageNotFound</div>
    </div>
</body>

</html>