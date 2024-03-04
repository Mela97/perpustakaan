<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori Web Gramedia</title>
  <link rel="stylesheet" href="style.css">
  <Style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Body */
body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
}

/* Header */
header {
  background-color: #f0f0f0;
  padding: 10px 20px;
}

h1 {
  font-size: 24px;
  text-align: center;
}

/* Main */
main {
  display: flex;
  flex-wrap: wrap;
  padding: 20px;
}

/* Kategori Utama */
.kategori-utama,
.sub-kategori,
.filter {
  flex: 1 1 300px;
  margin: 10px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.kategori-utama h2,
.sub-kategori h2,
.filter h2 {
  margin-bottom: 10px;
}

/* Sub Kategori */
.sub-kategori ul li a {
  color: #999;
}

/* Filter */
.filter form {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.filter label {
  width: 80px;
}

.filter select,
.filter input[type="number"],
.filter input[type="text"] {
  width: 100%;
  padding: 5px;
  border: 1px solid #ddd;
  border-radius: 3px;
}

.filter button {
  background-color: #007bff;
  color: #fff;
  padding: 5px 10px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

/* Footer */
footer {
  background-color: #f0f0f0;
  padding: 10px 20px;
  text-align: center;
}
</style>
</head>
<body>
  <header>
    <h1>Gramedia</h1>
  </header>
  <main>
    <section class="kategori-utama">
      <h2>Kategori Utama</h2>
      <ul>
        <li><a href="#">Fiksi</a></li>
        <li><a href="#">Non-Fiksi</a></li>
        <li><a href="#">Pendidikan</a></li>
        <li><a href="#">Hobi & Kreativitas</a></li>
        <li><a href="#">Komik & Manga</a></li>
      </ul>
    </section>
    <section class="sub-kategori">
      <h2>Sub Kategori</h2>
      <ul>
        <li><a href="#">Fiksi Dewasa</a></li>
        <li><a href="#">Fiksi Remaja</a></li>
        <li><a href="#">Fiksi Anak</a></li>
        <li><a href="#">Pengembangan Diri</a></li>
        <li><a href="#">Bisnis & Ekonomi</a></li>
        <li><a href="#">Sains & Teknologi</a></li>
        <li><a href="#">Sejarah & Politik</a></li>
        <li><a href="#">dan banyak lagi</a></li>
      </ul>
    </section>
    <section class="filter">
      <h2>Filter</h2>
      <form action="#">
        <label for="kategori">Kategori:</label>
        <select name="kategori" id="kategori">
          <option value="">Semua Kategori</option>
          <option value="fiksi">Fiksi</option>
          <option value="non-fiksi">Non-Fiksi</option>
          <option value="pendidikan">Pendidikan</option>
          <option value="anak">Anak</option>
          <option value="hobi-kreativitas">Hobi & Kreativitas</option>
          <option value="komik-manga">Komik & Manga</option>
          <option value="impor">Impor</option>
          <option value="lainnya">Lainnya</option>
        </select>
        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit" id="penerbit">
        <label for="harga-min">Harga Minimum:</label>
        <input type="number" name="harga-min" id="harga-min">
        <label for="harga-max">Harga Maksimum:</label>
        <input type="number" name="harga-max" id="harga-max">
        <label for="bahasa">Bahasa:</label>
        <select name="bahasa" id="bahasa">
          <option value="">Semua Bahasa</option>
          <option value="indonesia">Indonesia</option>
          <option value="inggris">Inggris</option>
          <option value="lainnya">Lainnya</option>
        </select>
        <label for="rating">Rating:</label>
        <select name="rating" id="rating">
          <option value="">Semua Rating</option>
          <option value="1">1 Bintang</option>
          <option value="2">2 Bintang</option>
          <option value="3">3 Bintang</option>
          <option value="4">4 Bintang</option>
          <option value="5">5 Bintang</option>
        </select>
        <button type="submit">Cari</button>
      </form>
    </section>
  </main>
  <footer>
    <p>&copy; 2023 Gramedia</p>
  </footer>
</body>
</html>
