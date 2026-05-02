<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lapor Kades</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#eef5ee;
padding:35px;
color:#222;
}

/* HEADER */
header{
background:white;
padding:25px 35px;
border-radius:25px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 8px 25px rgba(0,0,0,.08);
margin-bottom:35px;
}

.logo{
display:flex;
align-items:center;
gap:20px;
font-size:42px;
font-weight:700;
color:#15803d;
line-height:1.2;
}

.logo img{
width:180px;
height:180px;
object-fit:contain;
}

.tagline{
font-size:26px;
color:#666;
}

/* HERO */
.hero{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:35px;
gap:30px;
}

.hero-text h1{
font-size:68px;
font-weight:700;
line-height:1.2;
margin-bottom:20px;
}

.hero-text span{
color:#16a34a;
}

.hero-text p{
font-size:28px;
color:#555;
max-width:900px;
line-height:1.5;
}

.hero-image img{
width:180px;
}

/* CARD */
.card{
background:white;
padding:35px;
border-radius:28px;
box-shadow:0 10px 30px rgba(0,0,0,.07);
margin-bottom:35px;
}

.card h2{
font-size:42px;
color:#16a34a;
margin-bottom:30px;
}

/* FORM */
.grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:30px;
}

input,textarea{
width:100%;
padding:22px;
border:1px solid #ddd;
border-radius:18px;
font-size:24px;
margin-bottom:20px;
outline:none;
}

textarea{
height:220px;
resize:none;
}

input:focus,
textarea:focus{
border:1px solid #16a34a;
}

button{
background:#15803d;
color:white;
border:none;
padding:18px 35px;
font-size:24px;
border-radius:16px;
cursor:pointer;
transition:.3s;
}

button:hover{
background:#166534;
}

/* UPLOAD */
.upload-box{
border:3px dashed #16a34a;
padding:35px;
border-radius:28px;
background:#f4fff4;
text-align:center;
}

.upload-box h3{
font-size:36px;
margin-bottom:10px;
}

.upload-box p{
font-size:22px;
color:#555;
margin-bottom:20px;
}

.upload-box input{
font-size:22px;
padding:15px;
}

.upload-box small{
display:block;
margin-top:15px;
font-size:18px;
color:#777;
}

.info-box{
margin-top:25px;
background:#dff7df;
padding:18px;
border-radius:14px;
font-size:18px;
color:#166534;
}

/* LAPORAN LIST */
.report{
display:flex;
gap:20px;
padding:20px;
border:1px solid #eee;
border-radius:18px;
margin-bottom:20px;
align-items:center;
}

.report img{
width:140px;
height:100px;
object-fit:cover;
border-radius:14px;
}

.report-content{
flex:1;
}

.report-content h3{
font-size:26px;
margin-bottom:8px;
}

.report-content p{
font-size:18px;
color:#555;
}

.badge{
background:#dcfce7;
color:#15803d;
padding:8px 15px;
border-radius:30px;
font-size:16px;
font-weight:600;
}

.delete{
background:#ffe8e8;
color:red;
padding:12px 18px;
border-radius:12px;
text-decoration:none;
font-size:16px;
}

/* RESPONSIVE */
@media(max-width:1000px){

.grid{
grid-template-columns:1fr;
}

.hero{
flex-direction:column;
gap:20px;
}

.hero-text h1{
font-size:40px;
}

.hero-text p{
font-size:18px;
}

.logo{
font-size:26px;
flex-direction:column;
text-align:center;
}

.logo img{
width:120px;
height:120px;
}

.tagline{
display:none;
}

.report{
flex-direction:column;
align-items:flex-start;
}
}
</style>
</head>

<body>

<!-- HEADER -->
<header>
<div class="logo">
<img src="{{ asset('assets/logo.png') }}" alt="Logo Desa">
<span>Lapor Kades</span>
</div>

<div class="tagline">
Bersama membangun desa lebih baik 🌿
</div>
</header>

<!-- HERO -->
<section class="hero">

<div class="hero-text">
<h1>
Lapor Kades,
<span>Suara Anda Membangun Perubahan</span>
</h1>

<p>
Sampaikan keluhan, aspirasi, dan laporan masyarakat dengan cepat dan mudah.
</p>
</div>

<div class="hero-image">
<img src="{{ asset('assets/leaf.png') }}" alt="">
</div>

</section>

<!-- FORM LAPORAN -->
<div class="card">
<h2>📝 Kirim Laporan</h2>

<form action="/kirim" method="POST" enctype="multipart/form-data">
@csrf

<div class="grid">

<div>
<input type="text" name="nama" placeholder="👤 Nama Anda" required>

<input type="text" name="judul" placeholder="📄 Judul Laporan" required>

<textarea name="isi" placeholder="📝 Isi laporan Anda secara detail..." required></textarea>

<button type="submit">🚀 Kirim Laporan</button>
</div>

<div class="upload-box">
<h3>📷 Upload Foto</h3>

<p>Lampirkan foto sebagai bukti pendukung</p>

<input type="file" name="foto">

<small>Format JPG / PNG (Maks 2MB)</small>

<div class="info-box">
ℹ Foto membantu kami memahami laporan Anda lebih baik.
</div>
</div>

</div>
</form>
</div>

<!-- DAFTAR LAPORAN -->
<div class="card">
<h2>📋 Daftar Laporan</h2>

@foreach($laporan as $row)
<div class="report">

@if($row->foto)
<img src="{{ asset('foto/'.$row->foto) }}" alt="">
@else
<img src="https://via.placeholder.com/140x100" alt="">
@endif

<div class="report-content">
<h3>{{ $row->judul }}</h3>
<p>{{ $row->isi }}</p>
<p style="margin-top:10px;">👤 {{ $row->nama }}</p>
</div>

<div class="badge">Baru</div>

<a href="/hapus/{{ $row->id }}" onclick="return confirm('Hapus laporan ini?')" class="delete">
🗑 Hapus
</a>

</div>
@endforeach

</div>

</body>
</html>