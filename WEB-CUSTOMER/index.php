<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AeroStreet.Shop</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
    <style>
      .home{
        background-image: url(b.jpg);
        background-size: cover;
      }

      .box {
          position: relative;
          overflow: hidden;
          border: 1px solid #ddd;
          padding: 16px;
          transition: all 0.3s ease;
      }

      .image {
          position: relative;
      }

      .cart-btn {
          background-color: maroon;
          color: white;
          border: none;
          padding: 10px;
          width: 100%;
          cursor: pointer;
          font-size: 16px;
          transition: background-color 0.3s ease;
      }

      .cart-btn:hover {
          background-color: #800000; /* Darker shade of maroon */
      }

      .box:hover .icons {
          bottom: 0; /* Move up to be visible */
      }

            .popup-ad {
          display: none;
          position: fixed;
          top: 20px;
          left: 50%;
          transform: translateX(-50%);
          z-index: 1000;
          background-color: #ffcc00;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }

          .popup-content {
        text-align: center;
        color: #333;
        font-size: 18px; /* Menambah properti font-size */
        line-height: 1.6; /* Menambah line-height untuk memperjelas kejelasan teks */
    }


      .popup-ad a {
          display: inline-block;
          background-color: #333;
          color: #fff;
          text-decoration: none;
          padding: 10px 20px;
          margin-top: 10px;
          border-radius: 5px;
          transition: background-color 0.3s ease;
      }

      .popup-ad a:hover {
          background-color: #555;
      }

    </style>
  </head>
  <body>
    <header>
      <input type="checkbox" name="" id="toggler" />
      <label for="toggler" class="fas fa-bars"></label>

      <a href="#" class="logo">AeroStreet<span>.</span></a>

      <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#product">Product</a>
        <a href="#review">Review</a>
        <a href="#contact">Contact</a>
      </nav>

      <div class="icons">
        <!-- <a href="#" class="fas fa-heart"></a> -->
        <a href="keranjang.php" class="fas fa-shopping-cart"></a>
        <a href="login.php">Logout</a>
    </div>
    </header>

    <div id="popup-ad" class="popup-ad">
    <div class="popup-content">
        <h2>Super Promo!</h2>
        <p>Dapatkan diskon hingga 50% untuk setiap pembelian di atas Rp 1.000.000,-</p>
        <a href="#product" id="belanja-sekarang-btn">Belanja Sekarang!</a>
    </div>
    </div>

    <section class="home" id="home">
      <div class="content">
        <h3>AeroStreet</h3>
        <span> Now Everyone Can Buy Good Shoes</span>
        <p>
          Sekarang Semua Orang Bisa Beli Sepatu Bagus, yang terselip harapan
          agar semua orang dari kalangan mana pun dapat membeli sepatu
          berkualitas dengan harga terjangkau.
        </p>
        <a href="#product" class="btn">shop now</a>
      </div>
    </section>

    <section class="about" id="about">
      <h1 class="headibg"><span>about</span> us</h1>
      <div class="row">
        <img src="gambar/aeropgn.jpeg" alt="" />

        <div class="content">
          <h3>Why choose us?</h3>
          <p>
            We present these shoes to our beloved customers, our shoes come in
            several materials, including canvas and synthetic leather. our shoes
            can be called sneakers.
          </p>
          <p>
            Aerostreet has several advantages that make it stand out in the
            market and become a choice for various groups of consumers:
            Affordable Prices: One of the important points of Aerostreet's
            philosophy is to provide high-quality shoes at affordable prices.
          </p>
          <a href="#" class="btn">learn more </a>
        </div>
      </div>
    </section>

    <section class="icons-container">
      <div class="icons">
        <img src="gambar/a-removebg-preview.png" alt="" />
        <div class="info">
          <h3>free ongkir</h3>
          <span>on all orders</span>
        </div>
      </div>

      <div class="icons">
        <img src="gambar/c-removebg-preview.png" alt="" />
        <div class="info">
          <h3>Pengembalian</h3>
          <span>on all orders</span>
        </div>
      </div>

      <div class="icons">
        <img src="gambar/d-removebg-preview.png" alt="" />
        <div class="info">
          <h3>free some gifts</h3>
          <span>on all orders</span>
        </div>
      </div>

      <div class="icons">
        <img src="gambar/e-removebg-preview.png" alt="" />
        <div class="info">
          <h3>safety payment</h3>
          <span>on all orders</span>
        </div>
      </div>
    </section>

    <section class="products" id="product">
      <h1 class="heading">produk <span>terbaru</span></h1>
      <div class="box-container">
      <div class="box">
            <span class="discount">-50%</span>
            <div class="image">
                <img src="gambar/aero1.jpg" alt="" />
                <div class="icons">
                    <form method="post" action="keranjang.php">
                        <input type="hidden" name="id_produk" value="0">
                        <button type="submit" class="cart-btn">add to cart</button>
                    </form>
                </div>
            </div>
            <div class="content">
                <h3>Massiv low hitam natural</h3>
                <div class="price">Rp. 154.900 <span>Rp. 319.800</span></div>
            </div>
        </div>


        <div class="box">
          <span class="discount">-50%</span>
          <div class="image">
            <img src="gambar/aero2.jpg" alt="" />
            <div class="icons">
            <form method="post" action="keranjang.php">
                <input type="hidden" name="id_produk" value="1">
                <button type="submit" class="cart-btn">add to cart</button>
            </form>
            </div>
          </div>
          <div class="content">
            <h3>Hoops low putih hitam putih</h3>
            <div class="price">Rp. 164.900<span>Rp. 339.800</span></div>
          </div>
        </div>

        <div class="box">
          <span class="discount">-50%</span>
          <div class="image">
            <img src="gambar/aero3.jpg" alt="" />
            <div class="icons">
            <form method="post" action="keranjang.php">
                <input type="hidden" name="id_produk" value="2">
                <button type="submit" class="cart-btn">add to cart</button>
            </form>
            </div>
          </div>
          <div class="content">
            <h3>brookly natural biru navy</h3>
            <div class="price">Rp. 174.900<span>Rp. 359.800</span></div>
          </div>
        </div>

        <div class="box">
          <span class="discount">-50%</span>
          <div class="image">
            <img src="gambar/aero4.jpg" alt="" />
            <div class="icons">
            <form method="post" action="keranjang.php">
                <input type="hidden" name="id_produk" value="3">
                <button type="submit" class="cart-btn">add to cart</button>
            </form>
            </div>
          </div>
          <div class="content">
            <h3>classic natural hitam</h3>
            <div class="price">Rp. 174.900<span>Rp. 359.800</span></div>
          </div>
        </div>

        <div class="box">
          <span class="discount">-50%</span>
          <div class="image">
            <img src="gambar/aero5.jpg" alt="" />
            <div class="icons">
            <form method="post" action="keranjang.php">
                <input type="hidden" name="id_produk" value="4">
                <button type="submit" class="cart-btn">add to cart</button>
            </form>
            </div>
          </div>
          <div class="content">
            <h3>olivia natural matcha</h3>
            <div class="price">Rp. 154.900<span>Rp. 319.800</span></div>
          </div>
        </div>

        <div class="box">
          <span class="discount">-50%</span>
          <div class="image">
            <img src="gambar/aero6.jpg" alt="" />
            <div class="icons">
            <form method="post" action="keranjang.php">
                <input type="hidden" name="id_produk" value="5">
                <button type="submit" class="cart-btn">add to cart</button>
            </form>
            </div>
          </div>
          <div class="content">
            <h3>comfy hitam sepatu slip on slop casual</h3>
            <div class="price">Rp. 149.900<span>Rp. 299.800</span></div>
          </div>
        </div>

        <div class="box">
          <span class="discount">-50%</span>
          <div class="image">
            <img src="gambar/aero7.jpg" alt="" />
            <div class="icons">
            <form method="post" action="keranjang.php">
                <input type="hidden" name="id_produk" value="6">
                <button type="submit" class="cart-btn">add to cart</button>
            </form>
            </div>
          </div>
          <div class="content">
            <h3>queen putih </h3>
            <div class="price">Rp. 139.900<span>Rp. 279.800</span></div>
          </div>
        </div>

        <div class="box">
            <span class="discount">-50%</span>
            <div class="image">
                <img src="gambar/aero8.jpg" alt="" />
                <div class="icons">
                <form method="post" action="keranjang.php">
                <input type="hidden" name="id_produk" value="7">
                <button type="submit" class="cart-btn">add to cart</button>
            </form>
                </div>
            </div>
            <div class="content">
                <h3>jennie putih abu muda</h3>
                <div class="price">Rp. 154.900<span>Rp. 319.800</span></div>
            </div>
        </div>

        <div class="box">
          <span class="discount">-50%</span>
          <div class="image">
            <img src="gambar/aero9.jpg" alt="" />
            <div class="icons">
            <form method="post" action="keranjang.php">
                <input type="hidden" name="id_produk" value="8">
                <button type="submit" class="cart-btn">add to cart</button>
            </form>
            </div>
          </div>
          <div class="content">
            <h3>aurora lilac putih</h3>
            <div class="price">Rp. 154.900<span>Rp. 319.800</span></div>
          </div>
        </div>

        <div class="box">
          <span class="discount">-50%</span>
          <div class="image">
            <img src="gambar/aero10.jpg" alt="" />
            <div class="icons">
            <form method="post" action="keranjang.php">
                <input type="hidden" name="id_produk" value="9">
                <button type="submit" class="cart-btn">add to cart</button>
            </form>
            </div>
          </div>
          <div class="content">
            <h3>jennie hitam putih emas</h3>
            <div class="price">Rp. 154.900<span>Rp. 319.800</span></div>
          </div>
        </div>
    </section>

    <section class="review" id="review">
      <h1 class="heading">penilaian <span>produk</span></h1>
      <div class="box-container">
        <div class="box">
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p>
            Brand sepatu ini keren sekali, sangat wotrth it untuk dimiliki. 
            harga terjangkau kualitas terbaik, sepatu lokal rasa internasional.
            Pokok nggk nyesel deh beli disini tk jamin sepatunya bagus-bagus + keren beuttt
            Langganan banget toko ini! Pelayanan nya juga enak, model sepatu juga terbaru, modis,
            cocok bangetzzz buat Gen Z.
          </p>
          <div class="user">
            <img src="gambar/orang1.jpg" alt="" />
            <div class="user-info">
              <h3>Mikey Septian</h3>
              <span>puas</span>
            </div>
          </div>
        </div>

        <div class="box">
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p>
              Pengiriman cpt, kualitas sepatu buagus bgd bahannya tebel,
              modelnya kece bgd dan ukuran 38 pas bgd d aq sesuai ukuran umum 
              biasanya klo aq beli sepatu. Pertama kali beli d sni lgsg jatuh cinta. 
              Aplgi pas dpt harga diskon 😍🥰. Sukses sll seller👍
          </p>
          <div class="user">
            <img src="gambar/orang2.jpeg" alt="" />
            <div class="user-info">
              <h3>Andi Pratama</h3>
              <span>puas</span>
            </div>
          </div>
        </div>

        <div class="box">
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p>
            aero street emang gausah di raguin lagi sih, sepatunya super bagus super nyaman 
            dan harganya terjangkau banget . bener-bener sebagus itu kualitasnya dan modelnya mantap”.
            gaada cacat sama sekali dan pengirimannya juga cepet.
            panjang kaki 23cm aku ambil yg uk 38 si dan nyaman banget di kaki
          </p>
          <div class="user">
            <img src="gambar/orang3.jpeg" alt="" />
            <div class="user-info">
              <h3>Yoon Jeonghan</h3>
              <span>puas</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="contact" id="contact">
      <h1 class="heading"><span>contact</span> us</h1>
      <div class="row">
        <form action="">
          <input type="text" placeholder="name" class="box" />
          <input type="email" placeholder="email" class="box" />
          <input type="number" placeholder="number" class="box" />
          <textarea
            name=""
            class="box"
            placeholder="message"
            cols="30"
            rows="10"
          ></textarea>
          <input type="submit" value="send message" class="btn" />
        </form>
        <div class="image">
          <img src="gambar/photo.jpg" alt="" />
        </div>
      </div>
    </section>
    
    <section class="footer">
      <div class="box-container">
        <div class="box">
          <h3>quick links</h3>
          <a href="#home">Home</a>
          <a href="#about">About</a>
          <a href="#product">Product</a>
          <a href="#review">Review</a>
          <a href="#contact">Contact</a>
        </div>

        <div class="box">
          <h3>extra links</h3>
          <a href="#">my account</a>
          <a href="keranjang.html">my order</a>
          <a href="#">my favorite</a>
        </div>

        <div class="box">
          <h3>Lokasi</h3>
          <a href="#">Surabaya</a>
          <a href="#">Malang</a>
          <a href="#">Solo</a>
          <a href="#">Jakarta</a>
          <a href="#">Manado</a>
        </div>

        <div class="box">
          <h3>contact info</h3>
          <a href="#">+62-890-0879-456</a>
          <a href="#">aerostreetshoes@gmail.com</a>
          <a href="#">Indonesia,Jawa Tengah</a>
        </div>
      </div>
    </section>


    <script>
      function toggleSidebar() {
          var sidebar = document.querySelector('.profile-sidebar');
          sidebar.classList.toggle('active');
      }

      document.addEventListener('DOMContentLoaded', function() {
    var popupAd = document.getElementById('popup-ad');

    // Tampilkan iklan
    popupAd.style.display = 'block';

    // Hilangkan iklan setelah 5 detik
    setTimeout(function() {
        popupAd.style.display = 'none';
    }, 5000); // 5000 milidetik = 5 detik

    // Tambahkan event listener pada tombol "Belanja Sekarang!"
    var belanjaSekarangBtn = document.getElementById('belanja-sekarang-btn');
    belanjaSekarangBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Menghentikan aksi default dari link

        // Sembunyikan iklan
        popupAd.style.display = 'none';

        // Gulir ke bagian produk (#product)
        var productSection = document.getElementById('product');
        productSection.scrollIntoView({
            behavior: 'smooth' // Efek gulir halus
        });
    });
});

  </script>

  </body>
</html>
