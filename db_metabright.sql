-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Jul 2022 pada 20.31
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_metabright`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `nomor` varchar(128) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `tagihan` int(11) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `id_kursus` int(11) DEFAULT NULL,
  `kursus` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_checkout`
--

INSERT INTO `tbl_checkout` (`id`, `id_user`, `nama`, `nomor`, `pesan`, `tagihan`, `image`, `id_kursus`, `kursus`, `status`, `date`) VALUES
(50, 72, 'joni', '083116299191', 'contoh', 2, 'bukti-transfer-m-banking-bca-asli_.jpg', 6, 'Web Engineering: From Beginning To Advance, Case Study', 2, '1657552710'),
(51, 73, 'nisa', '083116299191', 'Contoh 2', 2, 'bukti-transfer-m-banking-bca-asli_1.jpg', 3, 'Bootcamp Research Development For Doctoral Program Students Uses The Concept Of Empirical Study', 3, '1657558257'),
(52, 72, 'Riyan Saputra', '083116299191', 'contoh 3', 2, 'bukti-transfer-m-banking-bca-asli_2.jpg', 3, 'Bootcamp Research Development For Doctoral Program Students Uses The Concept Of Empirical Study', 2, '1657640705'),
(53, 74, 'Riyan Saputra', '083116299191', 'Ikut join dengan bootcamp ini', 1, NULL, 3, 'Bootcamp Research Development For Doctoral Program Students Uses The Concept Of Empirical Study', 1, '1657643238');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_checkout_status`
--

CREATE TABLE `tbl_checkout_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_checkout_status`
--

INSERT INTO `tbl_checkout_status` (`id`, `status_name`) VALUES
(1, 'Pending'),
(2, 'Approved'),
(3, 'disapproved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_checkout_tagihan`
--

CREATE TABLE `tbl_checkout_tagihan` (
  `id` int(11) NOT NULL,
  `tagihan_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_checkout_tagihan`
--

INSERT INTO `tbl_checkout_tagihan` (`id`, `tagihan_status`) VALUES
(1, 'Not-paid'),
(2, 'Paid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_conference`
--

CREATE TABLE `tbl_conference` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_conference`
--

INSERT INTO `tbl_conference` (`id`, `judul`, `image`, `link`, `date`) VALUES
(1, 'ICMIS 2022', 'ICMISlogo-2.png', 'https://icmis.asia/', 'Agustus 2022'),
(2, 'ICRI 2022', 'ICMISlogo.png', 'https://apssd.org/', 'Agustus 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_informasi`
--

CREATE TABLE `tbl_informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `slug` varchar(128) NOT NULL,
  `kategori` int(11) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `creator` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id`, `judul`, `image`, `konten`, `slug`, `kategori`, `status`, `creator`, `date_created`) VALUES
(12, 'Mempelajari Buku Non-Fiksi bersama Zahira.', 'cara_menjadi_penulis_novel_online_dibayar_1000.png', '&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:14.0pt\"&gt;Cara Menjadi Penulis Novel, Light Novel Maupun Profesional!&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Zahira Media Publisher, Purwokerto &amp;ndash; &lt;/span&gt;&lt;/strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Raditya Dika dan Boy Chandra merupakan sedikitnya contoh orang yang sukses dalam membuat buku novel, Raditya dika dengan ciri komedinya yang banyak disematkan dalam novel dan Boy chandra yan memiliki banyak kisah romantis, masih banyak lagi penulis novel profesional yang sukses dalam membuat karya novel.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Banyak penulis yang bermunculan dalam dunia novel 10 tahun terakhir, tentunya mereka ingin meniti karir dan mengikuti jejak para penulis novel yang sudah sukses dalam menulis novel tersebut, tentunya kalian yang membaca artikel ini sudah pasti tertarik dan ingin membuat karya novel kalian sendiri bukan? Tenang saja, setiap orang bisa membuat novel karya mereka sendiri, karena sejatinya novel merupakan sebuah karya yang mengadaptasi dari imajinasi penulis maupun pengalaman pribadi dari penulis itu sendiri, jadi buat kalian yang memiliki banyak imajinasi yang baik coba saja untuk menulis novel dan terbitkan menjadi buku.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Cara Menjadi Penulis Novel&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Menurut Kamus Besar Bahasa Indonesia KBBI Novel adalah sebuah karangan prosa yang panjang serta mengandung cerita kehidupan dari seseorang dengan sekelilingnya yang menonjolkan watak serta sifat dari pelaku atau tokoh tersebut. Tentunya tujuan dan jenis novel yang akan kalian buat berbeda-beda, ada yang ingin menulis light novel maupun hanya ingin menjadi penulis novel online, tentunya penulis novel online dibayar, cara menjadi penulis light novel maupun novel lainya memiliki cara yang sama saja, akan tetapi light novel lebih ringan dalam pembahasan serta kebanyakan memiliki gambar hampir seperti komik namun tidak di gambar sepenuhnya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Berikut Cara-cara menjadi penulis novel :&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Menentukan Ide dan Menyusun Struktur Cerita Novel&lt;br /&gt;\r\n	Ide merupakan dasar awal tema dari sebuah novel yang akan dibahas dan menjadi pokok masalah dalam novel. Ide sendiri bisa kalian dapatkan dari berbagai macam cara, salah satunya dengan membaca atau menonton film, dengan banyaknya konsumsi cerita yang menarik menurut kita, maka hal tersbut dapat memberikan ide dan fikiran kita akan memberikan imajinasi yang akan digambarkan ceritanya nanti, ide juga bisa kita temukan dalam kehidupan kita sehari-hari yang menurut kita menarik dimasukan kedalam cerita, jadi setiap hal apapun yang kalian lakukan dan ingin kalian buat dalam cerita maka bisa kalian catat agar tidak hilang. Struktur Cerita Novel merupakan kerangka alur cerita dari awal sampai akhir, atau cerita kasarnya tokoh akan memulai dan berakhir seperti apa, dan nantinya kalian tianggal membuat cerita detail dari setiap kerangkanya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Mulai menulis&lt;br /&gt;\r\n	Mulai menulis lakukan ketika sudah menemukan ide, ketika jalan cerita sudah terbentuk maka dalam perjalanan ceritanya nanti akan mendapat ide-ide baru, dan ketika kalian tidak memulai menulis langsung malah menunggu ide lainya maka cerita akan sulit di kembangkan karena masih memikirkan ide yang belum ditulis.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Memilih Penerbit yang pas&lt;br /&gt;\r\n	Ketika sudah siap menjadi penulis novel, maka cobalah untuk berkonsultasi dengan penerbit yang ada, karena banyaknya penerbit akan memberikan arahan kepada penulisnya agar menjadi penulis novel yang baik sesuai kriteria dari penerbit tersebut, kita juga bisa bekerja sama dengan pihak penerbit dalam penjualan bukunya dan tentunya bisa mendapat royalti dari penjualan buku kita yang dipasarkan pihak penerbit sebagai gaji penulis novel itu sendiri.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Menggunakan Bahasa Yang ringan&lt;br /&gt;\r\n	Kebanyakan novel yang sudah terbit dan menjadi buku menggunakan bahasa keseharian penulis itu sendiri, karena apabila menggunakan bahasa yang terlalu baku dan formal akan membuat pembaca merasa cepat lelah dan bosan, apalagi ketika kita mencantumkan komedi atau adegan romantis dalam cerita novel yang kita buat, tentunya akan tidak enak dibaca dalam bahasa yang formal.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Banyak Membaca Referensi&lt;br /&gt;\r\n	Banyak sekali referensi novel yang bisa kalian gunakan untuk menambah ide dalam novel yang kalian buat, baca karya novel yang sudah besar dan terkenal, rajin membaca dan nikmati prosesnya, karena semakin banyak kalian tahu maka banyak juga ide yang akan kalian dapatkan.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Jangan Takut Memulai&lt;br /&gt;\r\n	Mulai saja dahulu, kalau karyamu di terima pihak penerbit dan lolos untuk di terbitkan sebagai buku, tentunya hal tersebut bisa jadi karya pertama kalian.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Baik itulah beberapa cara menjadi penulis novel bagi pemula, kalian bisa menulis light novel atau novel online dahulu sebagai latihan menulis, kedepanya kita akan membahas &lt;/span&gt;&lt;span style=\"font-size:10.0pt\"&gt;&lt;span style=\"background-color:white\"&gt;&lt;span style=\"color:black\"&gt;cara menjadi penulis di wattpad dan cara menjadi penulis di fizzo yang tentunya bisa dijadikan tempat kalian dalam membuat karya tulis.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:10.0pt\"&gt;&lt;span style=\"background-color:white\"&gt;&lt;span style=\"color:black\"&gt;Zahira Media Puublisher adalah penerbit buku yang berlokasi di Purwokerto Banyumas, jika kalian ingin berkonsultasi dengan kami secara Gratis silahkan klik DISINI!, kami bisa membantu dalam pembuatan cover sesuai keinginan dan layouting buku secara gratis, atau bisa kirim langsung naskah kalian DISINI, follow juga akun instagram ZAHIRA untuk mendapatkan informasi lainya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n', 'Mempelajari-Buku-Non-Fiksi-bersama-Zahira.', 6, 1, 'riyansaputratkj1@gmail.com', 1658491491),
(13, 'Bagaimana Syarat dan Prosedur Mengajukan HaKI Penting Sebelum pengajuan', 'cara_menjadi_penulis,_pemula_wajib_tahu_1000.png', '&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:14.0pt\"&gt;Cara Menjadi Penulis, Pemula Wajib Tahu!&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Zahira Media Publisher Purwokerto,. &lt;/span&gt;&lt;/strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Menjadi seorang penulis adalah salah satu profesi yang banyak diminati sejak dahulu. Seiring perkembangan zaman dan kemajuan teknologi profesi menulis pun memiliki banyak perkembangan, karena menulis bukan hanya buku dan novel saja, akan tetapi ada penulis lepas freelance atau penulis artikel dan lainya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Berbagai macam cara menjadi penulis buku pemula atau cara menjadi penulis lepas bagi pemula bertebaran di internet, kalian bisa memilih dan mempelajari materi-materi yang diberikan di internet, akan tetapi seorang penulis sendiri lebih condong ke kreatifitas dalam mengolah kata dan kalimat sedangkan materi yang diberikan di internet kebanyakan hanya memberikan struktur dan kerangka sebuah karya tulis, untuk penulisan isi dan kreatifitas harus dipelajari sendiri, dan nantinya akan meningkat secara sendirinya, karena kreatifitas seseorang tidak bisa di pelajari secara materi harus dilakukan dan di cari oleh diri sendiri.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Cara Menjadi Penulis Pemula&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Untuk menjadi seorang penulis tentunya kita juga harus mengetahui dasar-dasar dari materi yang akan kita gunakan dalam menulis oleh karena itu kita pastinya akan sedikit kesulitan dalam menentukan hal tersebut, dalam menentukan materi dan isi konten karya tulis kita harus belajar terlebih dahulu cara menjadi penulis buku pemula atau cara menjadi penulis lepas bagi pemula, berikut beberapa cara menjadi penulis :&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Banyak Membaca Karya Tulis Terkenal&lt;br /&gt;\r\n	Membaca akan menambah pengetahuan dan wawasan seseorang dalam mencari ide-ide baru, dengan rajin membaca akan membuat kita paham dan tahu cara penyajian materi yang baik dan benar. Dengan mengikuti langkah dan cara penulisan dari karya tulis yang sudah sukses di bidang tersebut maka akan membuat pandangan dan gambaran kita lebih baik lagi, jadi jangan sampai malas membaca.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Banyak Berlatih Menulis Sejak Dini&lt;br /&gt;\r\n	Dengan melakukan belajar secara terus menerus maka kemampuan yang kita miliki akan terus meningkat sesuai dengan kapasitas belajar yang kita lakukan, kebiasaan yang kita lakukan sejak dini dengan berlatih terus menerus akan mengasah kemampuan kita, meskipun umur kita dalam memulai menulis tidak sejak dini pun yang penting kita mau belajar dalam menulis pastinya kemampuan kita akan berkembang dengan semestinya. Cukup tulis apapun yang ingin kita berikan kepada orang lain kemudian susun dengan kalimat yang baik dan benar sehingga orang yang membaca akan tahu apa yang kita sampaikan maka hal tersebut sudah baik dalam penyampaian informasi.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Catat Ide-ide dan materi yang dimiliki&lt;br /&gt;\r\n	Ketika kita sedang dalam posisi sedang melakukan hal lain selain menulis tentunya seringkali kita mendapat ide-ide yang tidak sengaja muncul di pikiran kita, namun kalau kita tidak mencatat ide-ide tersebut mungkin akan sangat cepat lupa sehingga sangat membuat kita kesal waktu mau menulis, jadi mulai sekarang walaupun sedang berada diluar maupun sedang melakukan hal lain cobalah untuk membawa catatan dan catat apa yang terlintas, karena sayang kalau ide terbuang sia-sia.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Perbanyak Koneksi dalam Industri Penulisan&lt;br /&gt;\r\n	Banyak sekali industri penulisan di lingkungan sekitar kita, Coba manfaatkan Media Sosial untuk mencari koneksi dengan industri penulisan, contohnya industri penerbitan buku, penerbitan majalah, penerbitan artikel maupun jurnal, follow dan ikuti sosial medianya, cobalah untuk berkomunikasi cara menjadi partner menerbitkan karya tulis dan lainya di sosial media secara langsung.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Mengikuti Komunitas Penulis&lt;br /&gt;\r\n	Banyak bergaul dengan para penulis tentunya akan memberikan dampak yang baik terhadap kita, biasanya penulis akan memberikan arahan dan pengetahuan mereka didalam komunitas, kalian bisa bertanya langsung dan bisa di arahkan dalam membuat karya tulis.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Mengikuti Aturan Penerbit&lt;br /&gt;\r\n	Dengan mengikuti sosial media dari penerbit pastinya banyak informasi yang bisa kita ketahui, salah satunya informasi tentang aturan yang diterapkan oleh penerbit kepada penulisya, kita bisa mempelajari apa saja yang dibutuhkan dalam membuat karya seni sehingga bisa di terima dan di terbitkan oleh penerbit.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Baca Juga :&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Syarat Menjadi Penulis Buku&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Dalam membuat buku sedikitnya ada syarat-syarat yang harus dipenuhi agar bisa menghasilkan sebuah buku, dengan konsisten dan tekun belajar menjadi syarat utama kita bisa menjadi seorang penulis yang sukses dimasa mendatang karena semua diraih dengan sebuah proses yang tidak instant, berikut syarat menjadi penulis buku :&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Memiliki keterampilan menulis yang baik&lt;br /&gt;\r\n	Keterampilan menulis yang baik tentu saja tidak bisa di dapatkan secara instant, karena keterampilan merupakan sebuah kreatifitas dari diri sendiri, dengan tekun belajar dengan konsisten maka suatu saat bisa meningkat dengan sendirinya dan tidak bisa di ukur dengan teori saja.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Punya pengetahuan yang dalam&lt;br /&gt;\r\n	Dalam menulis sebuah buku tentu saja membutuhkan pengetahuan yang dalam, untuk memperbanyak jumlah kosakata dan referensi materi yang akan dimasukan kedalam materi buku tersebut, perbanyak membaca buku atau yang lainya yang memiliki topik dan tema yang sedang ingin kalian perdalam teorinya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Memiliki Pengalaman yang luas&lt;br /&gt;\r\n	Pengalaman setiap orang pastinya berbeda-beda, kita tidak tahu apa saja yang sudah dilalui seseorang sehingga bisa menghasilkan pengetahuan yang mereka kuasai sekarang, dengan mengikuti berbagai kegiatan dan hal yang mungkin berhubungan atau tidak berhubungan dengan apa yang kita bahas tentu saja akan memiliki dampak tersendiri bagi kita yang melakukanya karena hal tersebut akan menjadi pengalaman bagi diri kita sendiri dan kita dapat menguraikan nantinya menjadi sebuah teori yang bisa kita sampaikan dalam karya tulis.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Memiliki Wawasan yang luas diberbagai bidang&lt;br /&gt;\r\n	Wawasan adalah hasil dari sebuah pengalaman, dengan memiliki pengalaman maka kita akan bertambah wawasanya. Oleh karena itu banyak penulis profesional yang sukses memiliki wawasan yang luas di berbagai bidang, sehingga mereka bisa membuat sebuah karya yang jarang orang lain tahu.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Dan itulah beberapa penjelasan mengenai cara menjadi penulis buku atau cara menjadi penulis pemula, kita juga bisa menggunakan cara menjadi penulis lepas bagi pemula karena kita hanya mempelajari syarat menjadi penulis saja maka akan memiliki dasar yang baik untuk menjadi seorang penulis.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Untuk kalian yang masih memiliki kesulitan dalam membuat karya tulis baik buku ajar, buku referensi, buku monograf atau buku lainya, kalian bisa konsultasi secara GRATIS DISINI, admin kami akan membantu mengarahkan dan membimbing dalam membuat karya tulis. Kalian juga bisa mengirim langsung naskah yang sudah dibuat DISINI untuk di terbitkan langsung, follow juga akun instagram ZAHIRA untuk informasi lainya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Zahira Teman Meraih Ilmu..&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n', 'Bagaimana-Syarat-dan-Prosedur-Mengajukan-HaKI-Penting-Sebelum-pengajuan', 1, 1, 'riyansaputratkj1@gmail.com', 1656259251),
(14, 'Beberapa Manfaat Yang Akan Kamu Dapatkan Ketika Membaca Buku.', 'Manfaat_Membaca_Buku_1000.png', '&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Zahira Media Publisher, Purwokerto.- &lt;/span&gt;&lt;/strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Jika kalian suka membaca buku pastinya kalian akan merasakan beberapa manfaat yang kalian dapatkan setelah membaca bukan? Tentunya hal tersebut tidak bisa kamu rasakan manfaatnya secara langsung atau instan, karena manfaat yang kalian dapatkan lebih ke pengetahuan dan wawasan, setelah kalian membaca pasti akan mendapat banyak sekali pengetahuan yang tentunya tidak sedikit yang belum kamu ketahui.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Baca Juga : Tips Meningkatkan Minat Membaca Sejak Dini, Untuk Anak.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Baik inilah beberapa manfaat yang akan kamu dapatkan ketika membaca buku:&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Yang peratama manfaat membaca Buku adalah Mengurangi Stress&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p style=\"margin-left:48px\"&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Menurut survei membaca buku dapat menurunkan tingkat stres hingga 68 persen. Tentunya lebih tinggi dibandingkan mengurangi tingkat stres dengan mendengarkan musik atau hanya bermain game.&lt;br /&gt;\r\nHal ini tentunya menjadikan seseorang yang gemar membaca buku memiliki tingkat stress yang rendah, apalagi ketika membaca buku seperti novel dan buku yang asik lainya tentunya dapat menenagkan fikiran dan hati lebih baik lagi, jadi buat kalian yang sering stress atau banyak tekanan dari luar cobalah untuk meluangkan waktu untuk membaca, karena akan banyak maafaat yang kamu terima nantinya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=\"2\"&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Dapat Menstimulasi Metal&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p style=\"margin-left:48px\"&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Membaca buku tentunya membuat kita terus berfikir secara pelan dan mengikuti alur materi buku, dengan demikian kita dapat menjaga otak tetap berfungsi dan aktif dengan baik dan benar dengan kurun waktu tertentu.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p style=\"margin-left:48px\"&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Menurut penelitian Proceedings of the National Academy of Sciences, orang berusia lanjut yang sering menstimulasi otak mereka dengan membaca, 2,5 kali lebih kecil berisiko mengalami Alzheimer. Tentu saja hal ini dapat membuat kesehatan kamu lebih baik lagi, jadi buat kebiasaan membaca dari sekarang yah sahabat Zahira.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=\"3\"&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Membaca Buku Menambah Pengetahuan&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p style=\"margin-left:48px\"&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Ini adalah menfaat utama membaca buku, pastinya orang yang gemar membaca memiliki pengetahuan yang luas dibandingkan orang yang tidak suka membaca bukan? Buku yang kamu baca setiap hari akan memberikan ilmu yang belumm kamu ketahui sebelumnya, contohnya buku Ajar, Buku Monograf, Buku referensi dan lainya. Jadi buatlah membaca sebagai hobi agar kamu semakin pintar dan banyak pengetahuan nantinya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=\"4\"&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Membaca Buku Dapat Memperbaiki Memori&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p style=\"margin-left:48px\"&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Kebiasaan membaca buku juga dapat meningkatkan daya ingat seseorang. Sebab, ketika sedang membaca, otak tidak hanya menguraikan kata-kata yang dibaca. Dengan membaca, neurobiologis seseorang akan memproses gambar maupun ucapan yang muncul terutama saat membaca. Selain itu, bagian otak akan mengatur penglihatan dan bahasa bekerja sama untuk menghasilkan sesuatu yang kamu mengerti dan lebih mudah untuk diingat.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=\"5\"&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Menambah Kosakata&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p style=\"margin-left:48px\"&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Jika kamu masih kesulitan dalam merangkai kalimat dan kekurangan kosakata tentunya kamu harus sering-sering membaca buku, dengan membaca buku yang belum pernah kalian baca sebelumnya akan memberikan kosakata yang belum kalian pahami, semakin banyak dan sering kalian membaca maka kosakata yang ada didalam buku akan kalian masukan kedalam pikiran dan bisa kalian gunakan ketika dibutuhkan. Hal ini juga sangat berdampak bagi anak-anak yang belum memiliki banyak kosakata yang dikuasai maka apabila banyak membaca, anak akan mudah memahami dan mengolah kata suatu saat nanti.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=\"6\"&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Membantu meningkatkan konsentrasi&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p style=\"margin-left:48px\"&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Tentunya membaca buku akan membuat kamu menjadi semakin konsentrasi dan fokus, karena dalam membaca buku tentunya akan berkonsentrasi dan fokus terhadap materi dan alur buku yang dibaca, sehingga hal tersebut akan meningkat secara perlahan.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=\"7\"&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Membaca Buku Mencegah Penurunan Fungsi Kognitif&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p style=\"margin-left:48px\"&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Kemampuan mengingat seseorang akan semakin menurun seiring bertambahnya usia. Namun beberapa penelitian menyatakan bahwa membaca dapat membantu bahkan mencegah penurunan kemampuan kognitif. Bahkan dapat membantu mencegah bentuk gangguan kognitif lebih parah seperti Alzheimer. Apabila kalian semakin bertambah usia dan memiliki ingatan semakin buruk, maka cobalah untuk membaca di waktu luang kalian dan berkonsentrasi pada apa yang kalian baca, sehingga akan bermanfaat bagi otak dan membantu mencegah penurunan fungsi kognitif.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol start=\"8\"&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Membantu Meningkatkan Kualitas Tidur Kamu&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p style=\"margin-left:48px\"&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Seperti yang disampaikan dalam penelitian yang dipublikasi di Social Science &amp;amp; Medicine, hal tersebut dikarenakan oleh cahaya yang berasal dari layar smartphone dapat menurunkan produksi melatonin di dalam otak, sebuah hormon yang mengingatkan untuk tidur. Oleh sebab itu, penting halnya untuk menukar kebiasaan menggunakan smartphone dengan membaca sebelum tidur. Hal ini berdasarkan yang disampaikan oleh Mayo Clinic, bahwa menciptakan kebiasaan membaca sebelum tidur dapat meningkatkan kualitas tidur. &lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Dari sebagian manfaat yang sudah dijelaskan diatas, apakah kalian sudah merasakan? Semoga saja dengan gemar membaca, kalian bisa memperbaiki kualitas hidup dan bisa merasakan manfaat yang ada.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Buat kalian yang tidak ingin hanya membaca buku saja dan ingin membuat buku sendiri, kalian bisa langsung kunjungi Web kami DISINI, banyak promo menarik tentang buku, atau kalau kalian mau berkonsultasi secara GRATIS cara membuat buku bisa hubungi wa admin kami &lt;a href=\"https://wa.me/6283116299191\"&gt;DISINI&lt;/a&gt;, Akan diberi arahan dan bimbingan secara langsung sampai menghasilkan buku pertama kamu. Cek juga katalog ig kami DISINI, kami adalah Penerbit Buku Purwokerto dan Toko Buku Purwokerto, Toko kami juga ada di SHOPEE menjual berbagai macam buku yang menarik dan banyak ilmu pengetahuan tentunya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p style=\"margin-left:48px\"&gt;&amp;nbsp;&lt;/p&gt;\r\n', 'Beberapa-Manfaat-Yang-Akan-Kamu-Dapatkan-Ketika-Membaca-Buku.', 9, 1, 'riyansaputratkj1@gmail.com', 1656259259),
(15, 'Kenali Buku Bajakan, inilah Ciri-ciri Buku Bajakan yang harus kamu tau!', 'Ciri-ciri_buku_bajakan_1000.png', '&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Zahira Media Publisher, Purwokerto, - &lt;/span&gt;&lt;/strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Apakah kamu pernah menemui sebuah buku bajakan? Atau bahkan apakah kamu membelinya? Eitss.. mulai sekarang hentikan ya guys.. hal tersebut sangatlah tidak di anjurkan, walaupun harganya jauh lebih murah dari pada aslinya, akan tetapi melanggar hukum loh, dan merugikan penulis buku tersebut.&lt;br /&gt;\r\nSimak beberapa ciri-ciri buku bajakan ini yahh.. semoga bermanfaat.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Bentuk-bentuk buku bajakan yang sering dijual di pasaran :&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Mereproduksi dan menjual kembali buku, &lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Mengutip, meng-screenshot, mengunduh, serta menjual kembali versi e-book secara ilegal, &lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Memfotokopi buku dan dijual kembali, &lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Produksi, menduplikasi, dan menerjemahkan tanpa izin penerbit.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Baca Juga :&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Sanksi tegas terhadap pembajakan sudah tertuang didalam undang-undang, Tertulis dengan jelas hukumannya bisa kurungan penjara hingga 4 tahun dan denda mulai dari Rp 100 juta sampai Rp 4 miliar. Akan tetapi pembajakan buku masih sering terjadi di pasaran, hal tersebut sering membuat geram dan kesal para penulis buku, walaupun dengan adanya pembajakan tersebut harga buku jauh lebih murah dan para pembaca bisa membeli dengan harga terjangkau, akan tetapi jika masih dilakukan dan kamu mengikuti membeli buku yang murah sama saja dengan mematikan industri kreatif secara perlahan, dan mendukung pencurian dan duplikasi.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Ciri-ciri Buku Bajakan =&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Warna sampul yang terlihat sedikit berbeda, dan finishing yang tidak rapih pada hasil cetakan.&lt;/span&gt;&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;span style=\"font-size:12.0pt\"&gt;Pepatah mengatakan &amp;ldquo;Jangan menilai sesuatu dari Covernya&amp;rdquo; akan tetapi tidak berlaku untuk menilai sebuah buku, karena untuk menilai sebuah buku bajakan atau tidak hal yang pertama dilihat tentunya cover buku tersebut, apakah covernya sama dengan original buku tersebut, bagaimana kondisi fisik finishing bukunya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Kualitas Kertas dan Tinta yang Rendah.&lt;/span&gt;&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;span style=\"font-size:12.0pt\"&gt;Kualitas dari buku bajakan memang lebih rendah dari versi ori nya, itu merupakan hal yang lumrah, pasalnya pembajak akan mencetak ulang dengan biaya yang jauh lebih murah, agar mereka mendapatkan keuntungan dari hasil penjualanya nanti.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Kekuatan perekat buku yang tidak rapih.&lt;/span&gt;&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;span style=\"font-size:12.0pt\"&gt;Ini merupakan hasil finishing yang memiliki kualitas rendah, karena itu tadi demi memangkas biaya produksi pembajak akan mengambil biaya yang memiliki kualitas rendah, biasanya buku bajakan memiliki tekstur yang lebih kasar seperti pada bagian punggung buku, karena perekat buku yang digunakan memiliki kualitas yang kurang, maka akan sangat terlihat jelas bahwa buku tersebut bukan produksi yang bagus originalnya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Harga yang murah dan tidak masuk akal.&lt;/span&gt;&lt;/strong&gt;&lt;br /&gt;\r\n	&lt;span style=\"font-size:12.0pt\"&gt;Apakah kamu pernah terfikirkan kalau buku yang dijual sangat murah mereka mendapat keuntungan dari mana? Sedangkan harga cetak bukunya bisa jauh lebih mahal. Nah kalau kalian berfikir tersebut pastinya itu hal yang bikin kita jadi waswas dan kuwatir kalau buku tersebut bajakan bukan? Kalau kalian tanya kepada pihak penerbit buku pasti kalian akan tahu kenapa buku yang original harganya tidak murah, biaya layouting, biaya cetak, biaya pendaftaran nomor ISBN, biaya jasa kepada penerbit banyak sekali biaya yang harus dikeluarkan dalam menciptakan sebuah buku. Nah kalau para pembajak buku mereka tidak usah memikirkan hal tersebut, mereka tinggal copy paste buku yang ada kemudian mencetak ulang. Gimana? Banyak kan biaya yang terpangkas, nah itulah mengapa mereka bisa mendapat untung dengan menjual di harga murah.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Nah itulah bebrapa ciri-ciri buku bajakan yang sering terlihat dipasaran, buat kamu pecinta buku harus tahu ciri-ciri tersebut, karena dengan menghindari buku bajakan, kamu akan membantu meningkatkan kualitas dunia kreatifitas dan original buku di pasaran, sehingga para penulis akan lebih semangat dalam menciptakan buku yang bisa memberikan ilmu pengetahuan untuk kalian tentunya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Zahira Media Publisher adalah sebuah penerbit buku yang berlokasi di purwokerto, Zahira juga menjual Buku yang di terbitkan, toko buku purwokerto, Apakah kamu tertarik menjadi seorang penulis Buku? Kami menyediakan konsultasi GRATIS bagi kamu yang ingin membuat buku DISINI, atau kamu sudah memiliki naskah Buku dan belum tahu gimana caranya menerbitkan? Kamu bisa tanyakan admin kami DISINI atau bisa juga langsung kirim naskah kamu DISINI, banyak paket yang murah dan terjangkau bagi pelajar loh, jadi jangan taku harga menerbitkan buku itu mahal, kamu juga bisa cek katalog buku kami DISINI, dan Follow akun Instagram Zahira, banyak info menarik yang bisa kamu dapatkan nantinya. &lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', 'Kenali-Buku-Bajakan-inilah-Ciri-ciri-Buku-Bajakan-yang-harus-kamu-tau', 9, 1, 'riyansaputratkj1@gmail.com', 1656259454),
(16, 'Jenis Musik Yang Bisa Membuatmu Lebih Nyaman dan Fokus Membaca, Membaca Sambil Mendengarkan Musik.', 'Membaca_Mendengarkan_Musik_1000.png', '&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Zahira Media Publisher, Purwokerto.- &lt;/span&gt;&lt;/strong&gt;&lt;span style=\"font-size:12.0pt\"&gt;Apakah kamu tipe orang yang lebih suka membaca sambil mendengarkan musik atau sesuatu yang instrumental?, jika iya kita sama loh, menurut saya membaca buku merupakan hal yang sangat seru, akan tetapi ketika kita mendapati isi buku yang kita baca sedang berada di fase yang datar dan tidak bisa membuat otak kita memproses sesuatu, tentunya hal tersebut dapat membuat kita menjadi mengantuk, dan sangat membosankan, mau di lewati tapi nanti akan tertinggal materi, kalau di baca membosankan, jadi kita bisa mengalihkan fokus membaca kita kedalam hal lain, mendengar merupakan hal yang dapat membuat rasa bosan kita berkurang, dengan di temani musik yang cocok dan membuat kita tenang tentunya akan membuat kita menjadi fokus kembali dan tidak merasa bosan.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Baca Juga :&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Baik inilah jenis musik yang direkomendasikan buat kamu yang suka membaca sambil mendengarkan musik.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Genre Musik Favorit Kamu.&lt;br /&gt;\r\n	Ya benar, tentu saja genre musik kesukaan kamulah yang pastinya bisa membuat kamu lebih betah dan tidak bosan dalam membaca buku, karena setiap orang pastinya memiliki jenis genre musik yang berbeda-beda maka dari itu kesukaan orang lain belum tentu kita juga suka, seperti ada yang menyukai musik POP, Dangdut, Reggae, Rock, Metal dan lainya.&lt;br /&gt;\r\n	Kamu suka musik jenis apa?&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Musik Instrumental&lt;br /&gt;\r\n	Apakah kamu suka jenis musik yang tidak memiliki lirik lagu? Tentunya jenis musik instrumental akan membuat kamu menjadi tenang mengalir dengan nada musik, karena musik intrumental tidak memiliki lirik lagu, maka kita bisa mendengarkan tanpa ikut menyanyi, karena kebiasaan ketika kita mendengarkan musik yang kita sukai pasti akan ikut bernyanyi, jadi musik instrumental bisa membuat kamu lebih fokus dengan nada musiknya.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Therapy Music&lt;br /&gt;\r\n	Jika kamu menyukai sesuatu yang bisa membuat kamu tenang ketika membaca, jenis music Therapy tentunya bisa menjadi pilihan buat kamu yang susah dalam berkonsentrasi, Enigma dan Secret Garden merupakan sedikit contoh dari music therapy yang mungkin bisa kamu coba.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Musik EDM atau Musik yang memberi semangat.&lt;br /&gt;\r\n	Musik jenis EDM merupakan musik dengan beat yang menyenangkan, dengan mendengarkan musik berjenis EDM tentunya membuat rasa kantuk kita akan hilang, dan bisa membuat kita lebih bersemangat, Progressive House, Deep house, Electro house, Trance, Future house merupakan beberapa contoh jenis musik EDM yang sangat populer.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n	&lt;li&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Musik Religi&lt;br /&gt;\r\n	Yang terakhir ini adalah jenis musik yang mungkin banyak di dengarkan oleh agama islam, setau saya musik di agama lain lebih sedikit, jadi jika di agama islam sendiri memiliki jenis musik Sholawat, yaitu musik yang berhubungan dengan agama islam, banyak yang mengatakan sholawat dapat membuat hati lebih tenang, karena lirik-lirik yang terkandung mengambil dari ayat suci.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p style=\"margin-left:24px\"&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Jadi itulah beberapa jenis musik yang wajib kamu coba ketika mebaca, karena ketika musik dapat membantu kamu untuk lebih fokus membaca, maka lakukanlah karena bukan hal buruk juga untuk di coba.&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p style=\"margin-left:24px\"&gt;&lt;span style=\"font-size:11pt\"&gt;&lt;span style=\"font-family:Calibri,sans-serif\"&gt;&lt;span style=\"font-size:12.0pt\"&gt;Zahira Media Publisher adalah sebuah penerbit buku yang berlokasi di purwokerto, Zahira juga menjual Buku yang di terbitkan, toko buku purwokerto, Apakah kamu tertarik menjadi seorang penulis Buku? Kami menyediakan konsultasi GRATIS bagi kamu yang ingin membuat buku DISINI, atau kamu sudah memiliki naskah Buku dan belum tahu gimana caranya menerbitkan? Kamu bisa tanyakan admin kami DISINI atau bisa juga langsung kirim naskah kamu DISINI, banyak paket yang murah dan terjangkau bagi pelajar loh, jadi jangan taku harga menerbitkan buku itu mahal, kamu juga bisa cek katalog buku kami DISINI, dan Follow akun Instagram Zahira, banyak info menarik yang bisa kamu dapatkan nantinya. &lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n', 'Jenis-Musik-Yang-Bisa-Membuatmu-Lebih-Nyaman-dan-Fokus-Membaca,-Membaca-Sambil-Mendengarkan-Musik.', 6, 1, 'riyansaputratkj1@gmail.com', 1658505982),
(38, 'contoh dua', 'FP.jpg', '&lt;p&gt;dwdw&lt;/p&gt;', 'contoh-dua', 1, 1, 'riyansaputratkj1@gmail.com', 1658510438);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_informasi_kategori`
--

CREATE TABLE `tbl_informasi_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_informasi_kategori`
--

INSERT INTO `tbl_informasi_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Teknologi'),
(6, 'Digital Marketing'),
(9, 'Data Mining');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_informasi_status`
--

CREATE TABLE `tbl_informasi_status` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_informasi_status`
--

INSERT INTO `tbl_informasi_status` (`id`, `status`) VALUES
(1, 'Publish'),
(2, 'Draft');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_journal`
--

CREATE TABLE `tbl_journal` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `access` int(2) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_journal`
--

INSERT INTO `tbl_journal` (`id`, `judul`, `link`, `image`, `access`, `volume`, `date`) VALUES
(2, 'IJIIS: International Journal of Informatics and Information Systems', 'http://ijiis.org/index.php/IJIIS/', 'IJIIS-Cover.png', 1, 'Current Vol. 4 No. 3', 'December 2021'),
(7, 'Journal of Applied Data Science', 'http://bright-journal.org/Journal/index.php/JADS/index', 'JADS.png', 1, 'Current Vol. 2 No. 4', 'December 2021'),
(8, 'International Journal for Applied Information Management', 'http://ijaim.net/journal/index.php/ijaim/index', 'IJAIM.jpg', 1, 'Current Vol. 1 No. 4', 'September 2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_journal_access`
--

CREATE TABLE `tbl_journal_access` (
  `id` int(11) NOT NULL,
  `access_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_journal_access`
--

INSERT INTO `tbl_journal_access` (`id`, `access_name`) VALUES
(1, 'Open Access'),
(2, 'Close Access');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kursus`
--

CREATE TABLE `tbl_kursus` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `pengajar` int(2) DEFAULT NULL,
  `harga` varchar(30) DEFAULT NULL,
  `akses` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kursus`
--

INSERT INTO `tbl_kursus` (`id`, `judul`, `logo`, `level`, `deskripsi`, `kategori`, `slug`, `pengajar`, `harga`, `akses`, `status`, `date`) VALUES
(3, 'Bootcamp Research Development For Doctoral Program Students Uses The Concept Of Empirical Study', 'course1.png', 1, 'This course guides you through the empirical research process in applied science and Information Communication Technology (ICT), from selecting the right research ideas and methods, through data collection, to complete your final paper before it is submitted to a journal. We will not talk about these steps, we will do these steps together. Each student will be mentored to complete a paper during the course, to train students to submit quality papers to peer-reviewed journals. Students may also join courses with an ongoing research project. This course can be of great help in co-written research processes as well as single-written projects.', 1, 'Bootcamp-Research-Development-For-Doctoral-Program-Students-Uses-The-Concept-Of-Empirical-Study', 8, 'Rp.5.000.000', 2, 1, '1656562822'),
(4, 'The Information Technology Infrastructure Library (ITIL) Exam Guide And Practice', 'Course_logo1.png', 1, 'The ITIL Foundation Level is an entry-level qualification that provides candidates with a general understanding of the key elements, concepts, and terminology used in the ITIL Service Lifecycle, as well as the connections between stages, processes, and their contribution to Service Management practices. Because people learn in a number of ways, our ITIL Foundations Course is designed to introduce ITIL principles in a variety of ways. You will actively participate in \"round table\" type discussions to put ITIL ideas into context, in addition to test preparation and practice quizzes. This method is more engaging and enjoyable, and it works.', 1, 'The-Information-Technology-Infrastructure-Library-ITIL-Exam-Guide-And-Practice', 11, 'Rp.7.450.000', 2, 1, '1656564062'),
(5, 'Data Mining Fundamental, Case Study', 'Recom3.PNG', 1, 'If you need to learn how to understand and create Machine Learning models used to solve business problems, this course is for you. You will learn in this course everything you need about the Data Mining process, Machine Learning and how to implement Machine Learning algorithms in Data Mining. This course was designed to provide information in a simple and straightforward way so as to ease learning methods. You will from scratch and keep building your knowledge step by step until you become familiar with the most used Machine Learning algorithms.', 2, 'Data-Mining-Fundamental-Case-Study', 8, 'Rp.5.250.000', 2, 1, '1656564338'),
(6, 'Web Engineering: From Beginning To Advance, Case Studyy', 'benefits3.png', 2, 'This course will help you to give you a basic, yet thorough understanding of both HTML and CSS. The course focuses on having you begin writing code right away so you can learn through doing, and build your own completely functional HTML and CSS webpage at the end.\r\nYou’ll begin by learning what HTML and CSS are, so you can get an understanding of what it is that they do. During the course you’ll build several mini-websites that take what it is that you’ve learned and apply it to real world exercises to help cement the skills.\r\nEveryone from aspiring web designers to bloggers, programmers to business owners can benefit from learning some HTML and CSS. Learn to begin building your own dynamic webpages or manage the page that you already have. If you plan on becoming a web programmer or a web designer yourself, HTML and CSS are the first two languages you’ll need to succeed. In fact HTML is required for anyone that wants to get into web development from any angle. Learning it simultaneously with CSS allows you to hit the ground running with page design.', 5, 'Web-Engineering:-From-Beginning-To-Advance,-Case-Studyy', 8, 'Rp.4.950.500', 2, 2, '1656564456'),
(7, 'Aplication Development Java & C#', 'Recom5.PNG', 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 5, 'Aplication-Development-Java-C', 8, 'Rp.8.250.000', 2, 1, '1656564614'),
(8, 'Digital Marketing Copywriting Ads and Promotion', 'Recom6.PNG', 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 4, 'Digital-Marketing-Copywriting-Ads-and-Promotion', 11, 'Rp.3.350.000', 2, 1, '1656564747'),
(16, 'fefe', 'benefits2.png', 2, 'ece', 2, 'fefe', 8, 'Rp.3.000.000', 2, 1, '1658599953'),
(17, 'contoh', 'benefits21.png', 1, 'Membuat', 2, 'contoh', 11, 'Rp.4.950.500', 2, 1, '1658631434');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kursus_akses`
--

CREATE TABLE `tbl_kursus_akses` (
  `id` int(11) NOT NULL,
  `access_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kursus_akses`
--

INSERT INTO `tbl_kursus_akses` (`id`, `access_name`) VALUES
(1, 'Open'),
(2, 'Close');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kursus_kategori`
--

CREATE TABLE `tbl_kursus_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kursus_kategori`
--

INSERT INTO `tbl_kursus_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Research Development'),
(2, 'Data Mining'),
(3, 'Management'),
(4, 'Digital Marketing'),
(5, 'App Development'),
(6, 'Web Development');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kursus_level`
--

CREATE TABLE `tbl_kursus_level` (
  `id` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kursus_level`
--

INSERT INTO `tbl_kursus_level` (`id`, `level_name`) VALUES
(1, 'Beginner'),
(2, 'Advanced');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kursus_status`
--

CREATE TABLE `tbl_kursus_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kursus_status`
--

INSERT INTO `tbl_kursus_status` (`id`, `status_name`) VALUES
(1, 'Publish'),
(2, 'Draft');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `id` int(11) NOT NULL,
  `id_kursus` int(11) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `media` varchar(100) DEFAULT NULL,
  `slug` varchar(128) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_materi`
--

INSERT INTO `tbl_materi` (`id`, `id_kursus`, `judul`, `deskripsi`, `media`, `slug`, `file`, `date`) VALUES
(17, 3, 'Day 1 Introduction', 'Ini Adalah deskripsi dari materi pertama yang akan di ajarkan kepada pengikut kursus', 'Zoom', 'Day-1-Introduction', 'edhy-sst-journal-manager-hal-37-47-agustus-2017-said-ist-akprind.pdf', '1656736996'),
(18, 3, 'Day 2 Literature riview', 'Ini Adalah Deskripsi penjelasan apa yang akan didapatkan dari materi hari kedua', 'E-book', 'Day-2-Literature-riview', 'videoplayback.mp4', '1656737083'),
(19, 3, 'Day 3 Reasearch Method', 'Ini Adalah penjelasan dari materi hari ke 3', 'Video', 'Day-3-Reasearch-Method', 'koding.jpeg', '1656737166'),
(20, 5, 'Day 1 Introduction', 'Ini Deskripsi pertama', 'E-Book', 'Day-1-Introduction', 'Pengertian_Struktur_Organisasi_2.pdf', '1656745901'),
(21, 7, 'Day 1 materi kursus dokumen', 'Mempelajari intro', 'E-Book', 'Day-1-materi-kursus-dokumen', 'Ketentuan_Nilai_Tugas_Praktik_atau_PKL.pdf', '1657733960');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajar`
--

CREATE TABLE `tbl_pengajar` (
  `id` int(11) NOT NULL,
  `pengajar` varchar(128) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `level` int(2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sertifikasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengajar`
--

INSERT INTO `tbl_pengajar` (`id`, `pengajar`, `deskripsi`, `level`, `image`, `sertifikasi`) VALUES
(8, 'TAQWA HARIGUNA, S.T., M.KOM., PH.D', 'Taqwa Hariguna, Ph.D. Currently an associate professor in Universitas Amikom Purwokerto, he got Doctoral degree from Southern Taiwan University of Technology, Taiwan. Right now he take other Doctoral degree in University Malaysia of Computer Science & Engineering, Malaysia. He has area of Specialty in Multivariate Statistical Analysis, E-Business, E-Commerce & E-Government, Marketing & Consumer Behavior and Management Information System. He has some publication in Q1, SCI and SSCI journal, he also editor in IJIIS, JADS, IJAIM and Sustainability journal.', 2, 'Pak_Taqwa.png', 'Wallpaper_Utama.png'),
(11, 'HUSNI TEJA SUKMANA, PH.D', 'The ITIL Foundation Level is an entry-level qualification that provides candidates with a general understanding of the key elements, concepts, and terminology used in the ITIL Service Lifecycle, as well as the connections between stages, processes, and their contribution to Service Management practices. Because people learn in a number of ways, our ITIL Foundations Course is designed to introduce ITIL principles in a variety of ways. You will actively participate in \"round table\" type discussions to put ITIL ideas into context, in addition to test preparation and practice quizzes. This method is more engaging and enjoyable, and it works.', 2, 'Pak_Husni_Teja_sukmana.png', 'Sertifikasi11.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajar_level`
--

CREATE TABLE `tbl_pengajar_level` (
  `id_level` int(11) NOT NULL,
  `level_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengajar_level`
--

INSERT INTO `tbl_pengajar_level` (`id_level`, `level_name`) VALUES
(1, 'Specialist'),
(2, 'Professional'),
(3, 'Advanced');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_create`) VALUES
(45, 'Riyan S', 'riyansaputratkj1@gmail.com', 'riyan.jpg', '$2y$10$MCll/C/tpluBfGJJIRCbXOrI3DfRVHaOcrlpotz44jKob4n1wIGHG', 1, 1, 1655608222),
(72, 'Lailatul Nisa', 'riyansaputramifanz@gmail.com', 'default.jpeg', '$2y$10$tBQ.kZFpfM4mvaKVytcBnutbhKQbfHeohg2nV2mZeKzyC8Y.xQ0qy', 2, 1, 1656774894);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_access_menu`
--

CREATE TABLE `tbl_user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user_access_menu`
--

INSERT INTO `tbl_user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(6, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_menu`
--

CREATE TABLE `tbl_user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user_menu`
--

INSERT INTO `tbl_user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_sub_menu`
--

CREATE TABLE `tbl_user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user_sub_menu`
--

INSERT INTO `tbl_user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profil', 'user', 'fas fa-user fa-fw', 1),
(3, 2, 'My Course', 'mycourse', 'fas fa-fw fa-graduation-cap', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-folder fa-fw', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 1, 'Daftar User', 'user/daftaruser', 'fas fa-fw fa-users', 1),
(9, 2, 'Bill Payment', 'order/pembayaran', 'fas fa-fw fa-money-bill-wave', 1),
(10, 1, 'Informasi', 'informasi/daftarinformasi', 'fas fa-fw fa-newspaper', 1),
(11, 1, 'Journal & Conference', 'jourconfe', 'fas fa-fw fa-book', 1),
(12, 1, 'Teacher', 'teacher', 'fas fa-fw fa-chalkboard-teacher', 1),
(13, 1, 'Course', 'course', 'fas fa-fw fa-school', 1),
(14, 1, 'Order', 'order', 'fas fa-fw fa-shopping-cart', 1),
(16, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(18, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_token`
--

CREATE TABLE `tbl_user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user_token`
--

INSERT INTO `tbl_user_token` (`id`, `email`, `token`, `date_created`) VALUES
(16, 'fanzzchips@gmail.com', 'nhaMWqvlI2aS3CeUN9wT0rLAMUSdcETTyUqZEeUNAjY=', 1657642753),
(17, 'fanzzchips@gmail.com', '/RnnT9o+cIt4WroeT3gj06wHEHc2y3dhRISaAufeSGc=', 1657642908);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_checkout_status`
--
ALTER TABLE `tbl_checkout_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_checkout_tagihan`
--
ALTER TABLE `tbl_checkout_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_conference`
--
ALTER TABLE `tbl_conference`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_informasi_kategori`
--
ALTER TABLE `tbl_informasi_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_informasi_status`
--
ALTER TABLE `tbl_informasi_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_journal`
--
ALTER TABLE `tbl_journal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_journal_access`
--
ALTER TABLE `tbl_journal_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kursus`
--
ALTER TABLE `tbl_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kursus_akses`
--
ALTER TABLE `tbl_kursus_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kursus_kategori`
--
ALTER TABLE `tbl_kursus_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kursus_level`
--
ALTER TABLE `tbl_kursus_level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kursus_status`
--
ALTER TABLE `tbl_kursus_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengajar`
--
ALTER TABLE `tbl_pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengajar_level`
--
ALTER TABLE `tbl_pengajar_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user_sub_menu`
--
ALTER TABLE `tbl_user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user_token`
--
ALTER TABLE `tbl_user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tbl_checkout_status`
--
ALTER TABLE `tbl_checkout_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_checkout_tagihan`
--
ALTER TABLE `tbl_checkout_tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_conference`
--
ALTER TABLE `tbl_conference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tbl_informasi_kategori`
--
ALTER TABLE `tbl_informasi_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_informasi_status`
--
ALTER TABLE `tbl_informasi_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_journal`
--
ALTER TABLE `tbl_journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_journal_access`
--
ALTER TABLE `tbl_journal_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kursus`
--
ALTER TABLE `tbl_kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_kursus_akses`
--
ALTER TABLE `tbl_kursus_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kursus_kategori`
--
ALTER TABLE `tbl_kursus_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_kursus_level`
--
ALTER TABLE `tbl_kursus_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kursus_status`
--
ALTER TABLE `tbl_kursus_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_materi`
--
ALTER TABLE `tbl_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajar`
--
ALTER TABLE `tbl_pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajar_level`
--
ALTER TABLE `tbl_pengajar_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_sub_menu`
--
ALTER TABLE `tbl_user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_token`
--
ALTER TABLE `tbl_user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
