/*
 Navicat Premium Data Transfer

 Source Server         : benim_mysql
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : kutuphane

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 13/03/2024 15:18:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for diller
-- ----------------------------
DROP TABLE IF EXISTS `diller`;
CREATE TABLE `diller`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of diller
-- ----------------------------
INSERT INTO `diller` VALUES (1, 'Türkçe');
INSERT INTO `diller` VALUES (2, 'İngilizce');
INSERT INTO `diller` VALUES (3, 'Almanca');
INSERT INTO `diller` VALUES (4, 'Arapça');
INSERT INTO `diller` VALUES (5, 'Rusça');

-- ----------------------------
-- Table structure for e1
-- ----------------------------
DROP TABLE IF EXISTS `e1`;
CREATE TABLE `e1`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `uyelik_turu` int NOT NULL,
  `mail` varchar(41) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(21) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `eklenme_tarihi` timestamp NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `uyelik`(`uyelik_turu`) USING BTREE,
  CONSTRAINT `uyelik` FOREIGN KEY (`uyelik_turu`) REFERENCES `e2` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of e1
-- ----------------------------

-- ----------------------------
-- Table structure for e2
-- ----------------------------
DROP TABLE IF EXISTS `e2`;
CREATE TABLE `e2`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kitap_sayisi` smallint NOT NULL,
  `odunc_suresi` smallint NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of e2
-- ----------------------------

-- ----------------------------
-- Table structure for genel_bilgiler
-- ----------------------------
DROP TABLE IF EXISTS `genel_bilgiler`;
CREATE TABLE `genel_bilgiler`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `site_adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `slogan` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `kisa_bilgi` tinytext CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
  `hakkinda` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
  `adres` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `e-mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of genel_bilgiler
-- ----------------------------
INSERT INTO `genel_bilgiler` VALUES (1, 'e-Kütüphanem', 'İYİ BİR KİTAP BİR HAZİNEDİR...', 'e-Kütüphane, geniş spektrumlu çoklu çözümler sunmasının yanı sıra sektörde yer alan diğer otomasyon sistemlerine alternatif olarak kütüphanelerin ihtiyaçlarına göre geliştirilebilen esnek bir mimari sunar. ', 'Otomasyon, bir işin insan ile makine arasında paylaşılmasıdır. Toplam işin paylaşım yüzdesi otomasyonun düzeyini belirler. İnsan gücünün yoğun olduğu otomasyon sitemleri yarı otomasyon, makinenin yoğun olduğu sitemler de tam otomasyon olarak adlandırılırlar.\r\n\r\nKütüphane Otomasyon Sistemi bilgi kaynaklarının izlenmesi, kayıt altına alınması ve özgün bilgi üretimi için gerekli tüketim ortamının alt yapısını sağlama işlevlerine sahiptir. Kütüphaneler, sadece dijital ve yazılı verilerin saklandığı mekanlar değil aynı zamanda bilgi alışverişinin gerçekleştiği sosyal kurumlardır.\r\n\r\nKütüphane otomasyon sistemleri sadece kütüphane ortamlarında bilgisayar kullanımlarını değil tüm bu işlemlerin internet ortamında ve senkron bir şekilde gerçekleştirilmesi aşamasına geçmiştir. Mobil teknolojileri de içine alan yeni nesil kütüphane otomasyon sistemleri ile ‘dijital kütüphaneler’ çağına geçmiş bulunuyoruz.\r\n\r\ne-Kütüphane, Dünya’nın dört bir yanındaki kütüphane, okul ve akademik kurum tarafından kullanılan, özgür yazılım ürünü bir kütüphane otomasyon yazılımıdır. \r\n\r\n', '', '', '', '', '');

-- ----------------------------
-- Table structure for iletisim_mesajlari
-- ----------------------------
DROP TABLE IF EXISTS `iletisim_mesajlari`;
CREATE TABLE `iletisim_mesajlari`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ad_soyad` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `tel` varchar(12) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `mail` varchar(101) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `mesaj` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of iletisim_mesajlari
-- ----------------------------
INSERT INTO `iletisim_mesajlari` VALUES (1, 'ASd', '05231231212', 'asdasd@asd.com', 'asda asd asdasd', '::1', '2023-12-26 14:50:56');

-- ----------------------------
-- Table structure for kategoriler
-- ----------------------------
DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE `kategoriler`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kategoriler
-- ----------------------------
INSERT INTO `kategoriler` VALUES (1, 'Anı');
INSERT INTO `kategoriler` VALUES (2, 'Roman');
INSERT INTO `kategoriler` VALUES (3, 'Hikaye');
INSERT INTO `kategoriler` VALUES (4, 'Gezi');
INSERT INTO `kategoriler` VALUES (5, 'Şiir');
INSERT INTO `kategoriler` VALUES (6, 'Biyografi');
INSERT INTO `kategoriler` VALUES (7, 'Din');
INSERT INTO `kategoriler` VALUES (8, 'Bilim');
INSERT INTO `kategoriler` VALUES (9, 'Çocuk');
INSERT INTO `kategoriler` VALUES (10, 'Ders');
INSERT INTO `kategoriler` VALUES (11, 'Tarih');

-- ----------------------------
-- Table structure for kitaplar
-- ----------------------------
DROP TABLE IF EXISTS `kitaplar`;
CREATE TABLE `kitaplar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yazar_id` int NOT NULL,
  `yayinevi_id` int NOT NULL,
  `isbn` varchar(13) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `basim_yili` year NOT NULL,
  `kategori_id` int NOT NULL,
  `baski_sayisi` tinyint UNSIGNED NOT NULL,
  `sayfa_sayisi` smallint UNSIGNED NOT NULL,
  `tanitim` mediumtext CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL,
  `yayin_dili` int NOT NULL,
  `ekleme_tarihi` timestamp NOT NULL DEFAULT current_timestamp,
  `durum` varchar(1) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT 'R',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `yazar`(`yazar_id`) USING BTREE,
  INDEX `yayinevi`(`yayinevi_id`) USING BTREE,
  INDEX `dil`(`yayin_dili`) USING BTREE,
  INDEX `kategori`(`kategori_id`) USING BTREE,
  CONSTRAINT `kitaplar_ibfk_1` FOREIGN KEY (`yayin_dili`) REFERENCES `diller` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `kitaplar_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriler` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `kitaplar_ibfk_3` FOREIGN KEY (`yayinevi_id`) REFERENCES `yayinevleri` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `kitaplar_ibfk_4` FOREIGN KEY (`yazar_id`) REFERENCES `yazarlar` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kitaplar
-- ----------------------------
INSERT INTO `kitaplar` VALUES (1, 'Kukla', 1, 1, '9789750846342', 2019, 2, 1, 256, 'İstihbaratçılar, polisler, askerler...\r\n\r\nBaşarılı bir gazeteci olduğu günleri ardında bırakmış Adnan’ın yolu yıllardır görmediği üvey kardeşi Doğan’la kesişir. Taban tabana zıt karakterli, bambaşka yaşamlar süren kardeşlerin bir araya gelme sebebi hangi karanlık güçlere hizmet ettiği bilinmeyen, devletin üstlenmediği operasyonlarda parmağı olan Doğan’ın köşeye sıkışmış olmasıdır. Kardeşine karşı hiçbir yakınlık hissetmeyen Adnan, içindeki ölmüş gazeteciyi de hayata geçiremez ve olayların dışında kalmak ister. Doğan’ın ısrarı ve kendi yaptığı bazı hatalarla, Türkiye’nin yakın tarihine damgasını vuracak en büyük siyasi çekişmenin ortasında bulur kendisini.\r\n\r\nSilahlarımız, bilgeliğimiz, yüreğimiz...\r\n\r\nYakın tarihimizde Susurluk Kazası olarak geçen olayın ardından yazılan Kukla, siyasi komplo, faili meçhul cinayetler ve komplolar üzerindeki sisi aralıyor ve okurun karşısına büyük resmi koyuyor.\r\n\r\nBoğum boğum bir şeylerin gırtlağıma doğru yükseldiğini hissettim. Anımsamak istemediğim için derinlere gömdüğüm bir acı içten içe kendini hissettirmeye başladı.', 1, '2022-11-23 20:45:09', 'R');
INSERT INTO `kitaplar` VALUES (2, 'İstanbul Hatırası', 1, 1, '9789750845987', 2019, 2, 1, 233, 'Yedi tepeli şehre çökmüş kasvet yüklü bir bulut, son nefesini vermiş yedi kurban...\r\n\r\nTarihî yarımadada işlenen sıra dışı bir cinayet, Başkomser Nevzat’ı harekete geçirir. Katil, avcuna antika bir sikke bıraktığı kurbanın cesedi üzerinden çözülmesini istediği bazı mesajlar vermiştir. Aynı cinayet ritüelinin parçası olmuş kurbanlar peşi sıra gelir; tüm kurbanların elinde bir sikke vardır ve her biri şehrin parlak dönemlerinde yaşamış bir imparatorunun döneminden kalma tarihi bir yapının önüne bırakılmıştır. Kurbanların ortak özelliği, İstanbul’a olan ihanetleridir. Peki katilin özelliği nedir?\r\n\r\nŞehrimizle birlikte yitirdiklerimize, birbirimize bakıyorduk.\r\n\r\nByzantion, Konstantinapol ve İstanbul... Sahipleri, sakinleri değişse de, yeni isimler edinip farklı karakterlere bürünse de değişmeyen bir şey var tarihi yarımadada; eskimeyen güzelliği. Ahmet Ümit İstanbul Hatırası’nda artık tehdit altında olan bu güzelliği merkeze alıyor ve yüksek gerilimli polisiyesiyle okuru hipnotize ederken aktardığı tarihi bilgilerle İstanbulluluk bilincini de canlandırmaya çalışıyor.\r\n\r\nŞehre bakıyorduk denizden. Sisler içindeydi İstanbul... Sisler içinde deniz... Sisler içinde teknemiz. Sultanahmet\'in minareleriydi görülen, Ayasofya\'nın kubbesi, Topkapı Sarayı\'nın kuleleri. Hiç yağmalanmamış, yıkılmamış, kirletilmemiş gibiydi şehir. Güneş doğmadan bir anlığına beliren bir hayal gibi... Büyülü bir bulut gibi... Bir masal imgesi gibi... Yeni kurulmuş bir kent gibi... Taze bir başlangıç gibi... Genç, umutlu, güzel...', 1, '2022-11-28 20:51:19', 'R');
INSERT INTO `kitaplar` VALUES (3, 'Sherlock Holmes : Kızıl Dosya', 2, 2, '9786059840736', 2017, 2, 1, 207, '“Her zincir ancak en güçsüz halkası kadar güçlüdür.” -Sherlock Holmes- \r\n\r\n“Akıl yürütme sanatı, uzun ve sabırlı çalışmalar sonucu elde edilir. Yetenekli bir akıl yürütücü, beynini boş bir oda gibi kullanır, gereksiz bilgileri eler ve odaya sadece işine yarayanları yerleştirir. Dönüp baktığında gördüğü ise, ona doğru sonucu veren, dâhice çizilmiş tablodur.” \r\n\r\nKızıl Dosya, Sir Arthur Conan Doyle’un ilk Sherlock Holmes romanı olmasının yanında “Sherlock Efsanesi” diyebileceğimiz, bütün o karmaşık ve ardındaki anlaşılmaz detayları görmeyi gerektiren, okuru adeta bir suç mahallinin tam ortasına atıp bırakan maceraların sadece başlangıcıdır. Diğer bir değişle bu kitap, okurun Baker Sokağı, 221B’deki daireye ilk ziyaretidir.', 1, '2022-11-23 21:02:37', 'R');
INSERT INTO `kitaplar` VALUES (4, 'Abartma Tozu', 3, 3, '9786056883569', 2019, 9, 1, 160, 'Bir sabah uyandık ve bizim kasaba toptan delirdi. \r\n\r\nAnnem sağlıklı yaşam uğruna evi dev bir organik tarım alanına dönüştürdü.\r\n\r\nBabaannem sevimli, minnoş pansiyonunu oteller zinciri yaptı.\r\n\r\nBabam daha çok para kazanmak için eve uğramaz oldu.\r\n\r\nKuzenim ata binerken resim yapmaya, flüt üflerken piyano çalmaya başladı.\r\n\r\nYengem temizlikle kafayı bozdu. Kocasını pis diye evden kovdu ve çocuklarını her gün suya yatırdıktan sonra mandalla çamaşır ipine astı.\r\n\r\nEtrafımda bir tane normal insan kalmadı.\r\n\r\nHa şimdi diyeceksin ki bir tek sen mi normalsin?\r\n\r\nEvet, bir tek ben normalim. Neyse ki mücadeleci bir ruhum var. Bu kasabadaki insanlara bir süper kahraman lazımsa o kesinlikle benim. Koca kasabada yanımda olan tek kişi, Tevfik Kılıkırkyarar. Gerçi o da çok normal değil ama olsun, o da insan.', 1, '2022-11-28 21:25:20', 'R');
INSERT INTO `kitaplar` VALUES (5, 'Bütün Sırlarıyla Türkler', 4, 4, '9786059059411', 2008, 11, 1, 286, '-Göktürk başbuğları Çin imparatorlarına \"Oğlum\" diye hitap ederlerdi.\r\n-Süvariler atlarına donuna (rengine) göre kümelenip sıraya dikerlerdi.\r\n-Asya hunları; sandalye, masa , dolap, perde ve tül kullanıyordu.\r\n-Tarkan unvanlı kişilere devletçe ceza verilmezdi.\r\n-Türklerin Anadolu\'ya ilk uzanışı 1071 değil ,395 yıldır.\r\n-Her kabilenin bir kutsal hayvanı ve damgası olurdu.\r\n-Osmanlıda okçular yaylarıyla birlikte yatardı.', 1, '2022-11-28 21:15:13', 'R');
INSERT INTO `kitaplar` VALUES (6, 'Taksiii', 5, 5, '9786051856957', 2021, 2, 1, 120, 'Bu kitapta doksanlı yıllardan itibaren İstanbul taksilerinde yaşadıklarımdan bir demet sundum okurlarıma. Turistleri, savunmasız yaşlıları, özellikle de yaşlı kadınları hedef alan taksici eziyetine sık maruz kalmış biri olarak yazdıklarımın çok kişinin yüreğine dokunacağına inanıyorum. Amacım, İstanbul’un taksi şoförlerini incitmek değil, sorunun çözümünü engelleyerek İstanbulluları kendi çıkarları için mağdur edenlere dikkat çekmek. Mesleklerini hakkıyla, namusuyla yapan çilekeş sürücülere ise saygılar olsun!', 1, '2022-11-23 22:06:24', 'R');
INSERT INTO `kitaplar` VALUES (7, 'Kayıp Dünya', 2, 6, '9786052951415', 2017, 2, 1, 300, 'Gazeteci E. D. Malone’un tek istediği Gladys’in kalbini kazanıp onunla evlenmekti. Profesör Challenger’ın amacı Güney Amerika’da hâlâ dinozorların ve diğer tarih öncesi sürüngenlerin yaşadığını kanıtlamak, Profesör Summerlee’nin hedefi ise bu iddianın sahtekârlık olduğunu ortaya çıkarmaktı. Bazı tuhaf gelişmelerin sonucunda bu üç kişi bir araya gelip Amazon Nehri’ne bir keşif gezisi yapmaya karar verince, böyle bir macerayı kaçırmak istemeyen Lord Roxton da onlara katıldı. Grup başlarda sakin bir keşif gezisi yapıyordu, ancak Amazon ormanlarının derinliklerinde ilerledikçe bilimsel araştırma gezisi tuhaf ve korkutucu bir maceraya dönüştü. \r\n\r\nDinozorlar ve tarih öncesi hakkında bugüne kadar okuduğunuz bütün romanların ve seyrettiğiniz bütün filmlerin çıkış noktası bu kitaptır.', 1, '2022-11-28 19:28:26', 'R');
INSERT INTO `kitaplar` VALUES (16, 'Sherlock Holmes : Dörtlerin Yemini', 2, 6, '9786053600725', 2011, 2, 1, 101, 'Sir Arthur Conan Doyle\'un akıl yürütme yeteneği çok güçlü Edinburghlu bir öğretmenden esinlenerek yarattığı Sherlock Holmes, 1877\'de yayımlanan Kızıl İpucu\'nda ilk kez boy gösterdi. Arkadaşı Dr. Watson ve düşmanı Prof. Moriarty ile birlikte birçok filmin de kahramanı olarak ün kazandı. Doyle\'un yazdığı tarihi romanlar ve tiyatro oyunları Sherlock Holmes\'un kazandığı ünün gölgesinde kaldı.\r\n\r\nDörtlerin Yemini\'ninde hırs ve entrikanın yol açtığı bir cinayetle düğümlenen olaylar, Holmes\'un rastlantıları birer delile çeviren gözlem gücü sayesinde umulmadık bir çözüme kavuşur. Sir A.C. Doyle ilginç bir kurguyu akıcı bir ifade ile birleştirerek bir dedektif öyküsünü edebiyatın klasikleri arasına yerleştirmiştir', 1, '2022-11-28 19:37:21', 'R');
INSERT INTO `kitaplar` VALUES (17, 'Sherlock Holmes : Korku Vadisi', 2, 6, '9789944886772', 2009, 2, 1, 189, 'Holmes\'un ele aldığı karmaşık cinayetler, karşılaştığı suçlular, sahte ipuçları, çaresiz kalmış kanun adamları, yalan söyleyen tanıklar, rastlantılar, dedektifin gözlem gücü, zekâsı ve ulaştığı umulmadık çözümler zevkli bir kurgu içinde, akıcı bir ifadeyle öykülenerek edebiyatın klasikleri arasına katıldı.', 1, '2022-11-28 20:21:56', 'R');
INSERT INTO `kitaplar` VALUES (18, 'Sherlock Holmes : Fısıltı', 2, 7, '9786053033097', 2020, 2, 1, 280, '1887\'de yeni yıl günlükleri ilk çıktığından beri, Arthur Conan Doyle\'un Sherlock Holmes\'u, yaratılan en güzel kurgusal karakterlerden birisi olmuştur.\r\n\r\nHer kitap, birbirinden harikulade hikayelerden oluşmaktadır. Tüm zamanların en iyi görev yapan dedektifi ünvanını ne ile kazandığını okudukça anlayacak ve bir Sherlock Holmes hayranı olacaksınız.', 1, '2022-11-28 20:41:15', 'R');
INSERT INTO `kitaplar` VALUES (19, 'Beyaz Diş', 6, 6, '9786052951309', 2017, 2, 1, 145, 'Kuzey Amerika’nın yaban topraklarında harika hayvanlar yaşar. Kurtlar sürüler hâlinde gezer, birbirinden güzel kuşlar her mevsim yeni yavrular yetiştirir, kunduzlar nehirlerde barajlar kurar, vaşaklar av peşinde koşar... Ancak bu yabanıl topraklarda yaşam çok zorludur. Kışlar çok uzun sürer ve her yeri kaplayan kar aylarca kalkmaz. Bahar gelip doğa canlanmaya başladığında bile hiçbir şey kolaylaşmaz, yiyecek bulmak ve daha da önemlisi birilerine av olmamak için güçlü ve akıllı olmak gerekir.\r\n\r\n\r\nDoğanın tüm güçleriyle hüküm sürdüğü bu topraklarda bir kurt yavrusu dünyaya gelir. Aslında diğer kurt yavrularından pek bir farkı yoktur, sadece güçlü ve akıllı olanların hayatta kaldığı bir ortamda şansın da yardımıyla yaşar. Ancak insanlarla karşılaştıktan sonra her şey değişir, bu noktadan sonra doğanın ona verdiği yetenekler kendisini kurtarmasına yeterli olmayacaktır. İnsanların yaptığı şeyler, en değerli yeteneğinin yani uyum sağlama becerisinin bile anlamını yitirmesine yol açar. Artık yaşam neredeyse akıl dışı bir maceradır.', 1, '2022-11-28 21:14:00', 'R');
INSERT INTO `kitaplar` VALUES (21, 'Kuşların Dili', 7, 8, '9789754730074', 2015, 9, 1, 102, 'Gülücük Çocuk Kitapları Dizisi içinde kültürümüzün temel klasik eserlerini sadeleştirerek yayınlamayı amaçlıyoruz. Mantuku`t Tayr, Feridüddin Attar`ın en bilinen eseridir. Kuşların bir yolculuğa çıkmaları ve yaşadıkları ilginç olayları anlatıyor bu kitap. Şiirimizin ve çocuk edebiyatımızın önde gelen yazarlarından Cahit Zarifoğlu`nun \"Kuşların Dili\" adıyla yeniden yazdığı bu kitabı çocuklarımızın severek okuyacağına inanıyoruz.', 1, '2022-11-29 12:53:24', 'R');
INSERT INTO `kitaplar` VALUES (22, 'Kırmızı Pelerin', 8, 9, '9786258215618', 2022, 2, 1, 424, 'Kırmızı Pelerin Kitap Açıklaması\r\n \r\n\r\nZamanında zihnimize yazılanlar, sonradan kaderimizi yazar…\r\n\r\nAçık kapıdan kırmızı pelerinli bir kız giriyor içeri. Bir filmden, bir masaldan kopup gelivermiş gibi hali var. Sabah ezanı okunurken, gün daha tam doğmamış, etraf henüz tam aydınlanmamışken insanın içine bir ürperti gelir ya, ona benzer bir duygu içimi yalayıp geçiyor. Hayalet gibi…\r\n\r\nŞu anda kapıyı bir açan olsa, bu kızın odanın ortasında, gözleri kapalı, pelerinin etekleri havalanmış, öylece döndüğünü, benim de keyifle onu seyrettiğimi görse ne düşünür acaba? Ne diyecek, “Biri deli, biri de deli doktoru” der. Onu huşu içinde seyrederken, “Acaba yaşadığı hangi acılar, içine düştüğü hangi çıkmazlar onu bir ruh doktorunun odasında böylesine döndürüyor?” diyorum içimden. İnsan bir psikiyatri kliniğine giderken neden böyle bir pelerin giyer, neden başına önü tüllü bir şapka takar ki… Bunların bir anlamı olmalı. Ve çok geçmeden yaşanan acılar, ince bir sızı gibi tel tel dökülüyor ağzından. Acının, korkunun, aşkın, sevdanın, umudun, umutsuzluğun en büyüğünü yaşamış bu kız.\r\n\r\nÇocuklukta yaşanan bir tacizin, bu tacizin koyu gölgesi altında geçen yılların, yalnızlığın, kimsesizliğin, her şey bitti derken açılan yepyeni kapıların, kısaca iyisiyle kötüsüyle macera dolu, dokunaklı bir hayatın hikâyesi bu; çok masum bir aşk hikâyesi aslında. \r\n\r\nKitabın bir yerlerinde mutlaka kendinizle ve sizde iz bırakanlarla karşılaşacaksınız. Umarım onları iyi tanır, önce kendinize, sonra da onlara biraz daha hoşgörüyle yaklaşabilirsiniz.', 1, '2022-11-29 14:27:46', 'R');

-- ----------------------------
-- Table structure for odunc_iade
-- ----------------------------
DROP TABLE IF EXISTS `odunc_iade`;
CREATE TABLE `odunc_iade`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kitap_id` int NOT NULL,
  `uye_id` int NOT NULL,
  `iade_gun` smallint NOT NULL,
  `alim_tarihi` timestamp NOT NULL DEFAULT current_timestamp,
  `iade_tarihi` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kitap`(`kitap_id`) USING BTREE,
  INDEX `uye`(`uye_id`) USING BTREE,
  CONSTRAINT `uye` FOREIGN KEY (`uye_id`) REFERENCES `e1` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of odunc_iade
-- ----------------------------

-- ----------------------------
-- Table structure for resimler
-- ----------------------------
DROP TABLE IF EXISTS `resimler`;
CREATE TABLE `resimler`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kitap_id` int NOT NULL,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kitap_resim`(`kitap_id`) USING BTREE,
  CONSTRAINT `kitap_resim` FOREIGN KEY (`kitap_id`) REFERENCES `kitaplar` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of resimler
-- ----------------------------
INSERT INTO `resimler` VALUES (1, 1, '9789750846342-1.jpg');
INSERT INTO `resimler` VALUES (2, 2, '9789750845987-1.jpg');
INSERT INTO `resimler` VALUES (3, 4, '9786056883569-1.jpg');
INSERT INTO `resimler` VALUES (4, 4, '9786056883569-2.jpg');
INSERT INTO `resimler` VALUES (5, 3, '9786059840736-1.jpg');
INSERT INTO `resimler` VALUES (6, 5, '9786059059411-1.jpg');
INSERT INTO `resimler` VALUES (7, 6, '9786051856957-1.jpg');
INSERT INTO `resimler` VALUES (8, 7, '9786052951415-1.jpg');
INSERT INTO `resimler` VALUES (9, 16, '9786053600725-1.jpg');
INSERT INTO `resimler` VALUES (11, 17, '9789944886772-1.jpg');
INSERT INTO `resimler` VALUES (12, 18, '9786053033097-1.jpg');
INSERT INTO `resimler` VALUES (13, 19, '9786052951309-1.jpg');
INSERT INTO `resimler` VALUES (14, 21, '9789754730074-1.jpg');
INSERT INTO `resimler` VALUES (15, 22, '9786258215618-1.jpg');

-- ----------------------------
-- Table structure for uyeler
-- ----------------------------
DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE `uyeler`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` varchar(1) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(64) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `uyelik_turu` int NOT NULL,
  `mail` varchar(41) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(21) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `dtarih` date NOT NULL,
  `sifre_istek` tinyint NOT NULL,
  `sifre_istek_tarihi` datetime NULL DEFAULT NULL,
  `giris_sayisi` int UNSIGNED NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `eklenme_tarihi` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `uyelik`(`uyelik_turu`) USING BTREE,
  CONSTRAINT `uyeler_ibfk_1` FOREIGN KEY (`uyelik_turu`) REFERENCES `uyelik_turleri` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uyeler
-- ----------------------------
INSERT INTO `uyeler` VALUES (1, 'ALPER', 'ODABAŞ', 'E', 'c015f02bf6bc81cf8ca3c67b8c42d5d8', 1, 'odabasalper@gmail.com', '501-452-7858', '1980-03-28', 0, NULL, 3, '::1', '2023-03-08 15:58:45');
INSERT INTO `uyeler` VALUES (2, 'VELİ', 'KAÇAR', 'E', 'c015f02bf6bc81cf8ca3c67b8c42d5d8', 2, 'velikacar@gmail.com', '501-452-7858', '1980-03-28', 0, NULL, 0, '::1', '2023-03-08 16:00:10');
INSERT INTO `uyeler` VALUES (6, 'AYŞE', 'KAPLAN', 'K', '30adc8800433ad80cbe407cc11232afd', 3, 'akaplan@gmail.com', '05624524552', '2015-12-28', 0, NULL, 1, '::1', '2024-03-13 15:12:09');

-- ----------------------------
-- Table structure for uyelik_turleri
-- ----------------------------
DROP TABLE IF EXISTS `uyelik_turleri`;
CREATE TABLE `uyelik_turleri`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kitap_sayisi` smallint NOT NULL,
  `odunc_suresi` smallint NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of uyelik_turleri
-- ----------------------------
INSERT INTO `uyelik_turleri` VALUES (1, 'Editör', 10, 60);
INSERT INTO `uyelik_turleri` VALUES (2, 'Yeni Üye', 3, 30);
INSERT INTO `uyelik_turleri` VALUES (3, 'Üye', 5, 45);

-- ----------------------------
-- Table structure for yayinevleri
-- ----------------------------
DROP TABLE IF EXISTS `yayinevleri`;
CREATE TABLE `yayinevleri`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(41) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `tel` varchar(21) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of yayinevleri
-- ----------------------------
INSERT INTO `yayinevleri` VALUES (1, 'Yapı Kredi Yayınları', 'Yapı Kredi Kültür Sanat Yayıncılık, \r\nİstiklal Caddesi No: 161 34433, Beyoğlu / İstanbul', 'iletisim@ykykultur.com.tr', '0 (212) 279 8148');
INSERT INTO `yayinevleri` VALUES (2, 'Ren Kitap', 'Maltepe Mah. Yılanlıayazma Sok. Zeytinburnu / İSTANBUL', 'merhaba@renkitap.com', '0 212 641 34 76');
INSERT INTO `yayinevleri` VALUES (3, 'Taze Kitap', '', 'bilgi@tazekitap.com', '0 212 641 34 77');
INSERT INTO `yayinevleri` VALUES (4, 'Babıali Kültür Yayınları', 'Sümer Mahallesi 30 Sokak No:24/A Zeytinburnu / İstanbul', NULL, '0212 528 85 19');
INSERT INTO `yayinevleri` VALUES (5, 'Everest Yayınları', 'Ticarethane Sok. No: 15 34410 Cağaloğlu İstanbul', 'info@everestyayinlari.com', '0212 513 34 20');
INSERT INTO `yayinevleri` VALUES (6, 'İş Bankası Kültür Yayınları', 'İstiklal Caddesi Meşelik Sokak No: 2 Beyoğlu / İstanbul', 'bilgi@iskultur.com.tr', '0 212 252 3991');
INSERT INTO `yayinevleri` VALUES (7, 'Anonim Yayınları', '', NULL, NULL);
INSERT INTO `yayinevleri` VALUES (8, 'Beyan Yayınları', 'Ankara Cd. No:21/3 Cağaloğlu Fatih', 'bilgi@beyanyayinlari.com', '0 212 512 76 97');
INSERT INTO `yayinevleri` VALUES (9, 'Doğan Yayınları', 'Doğan Yayınları Yayıncılık ve Yapımcılık A.Ş. 19 Mayıs Cad. Golden Plaza No:1 Kat:10 34360 - Şişli - İstanbul', 'satis@dogankitap.com.tr', '(0212) 373 77 00');

-- ----------------------------
-- Table structure for yazarlar
-- ----------------------------
DROP TABLE IF EXISTS `yazarlar`;
CREATE TABLE `yazarlar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ozgecmis` mediumtext CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  `cins` varchar(1) CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_turkish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of yazarlar
-- ----------------------------
INSERT INTO `yazarlar` VALUES (1, 'Ahmet ', 'Ümit', '1960’ta Gaziantep’te doğdu. 1983’te Marmara Üniversitesi Kamu Yönetimi Bölümü’nü bitirdi. 1985-1986 yıllarında, Moskova’da, Sosyal Bilimler Akademisi’nde siyaset eğitimi gördü. Şiirleri, 1989 yılında “Sokağın Zulası” adıyla yayımlandı. 1992’de ilk öykü kitabı “Çıplak Ayaklıydı Gece” yayımlandı. Bunu “Bir Ses Böler Geceyi”, “Agatha’nın Anahtarı”, “Şeytan Ayrıntıda Gizlidir” adlı polisiye öykü kitapları izledi. Hem çocuklara hem büyüklere yönelik “Masal Masal İçinde” ve “Olmayan Ülke” kitapları ile farklı bir tarz denedi. 1996’da yazdığı ilk romanı “Sis ve Gece”, polisiye edebiyatta bir başyapıt olarak değerlendirildi. Bu romanın ardından “Kar Kokusu”, “Patasana” ve “Kukla” yayımlandı. Bu kitapları “Ninatta’nın Bileziği”, “İnsan Ruhunun Haritası”, “Aşk Köpekliktir”, “Beyoğlu Rapsodisi”, “Kavim”, “Bab-ı Esrar”, “İstanbul Hatırası”, “Sultanı Öldürmek”, “Beyoğlu’nun En Güzel Abisi”, “Elveda Güzel Vatanım” ve “Kırlangıç Çığlığı” adlı kitapları izledi. Ahmet Ümit’in, İsmail Gülgeç’le birlikte hazırladığı “Başkomser Nevzat-Çiçekçinin Ölümü” ve “Başkomser Nevzat-Tapınak Fahişeleri”, “Aptülika” (Abdülkadir Elçioğlu) ile birlikte hazırladığı “Başkomser Nevzat-Davulcu Davut’u Kim Öldürdü?” ve Bartu Bölükbaşı ile birlikte hazırladığı “Elveda Güzel Vatanım-İttihatçıların Yükselişi” adlı çizgi romanları da bulunmaktadır.\r\n\r\nYayımlanmış 27 eseri bulunan Ahmet Ümit’in seksene yakın kitabı 26 yabancı dilde yayımlandı.\r\n\r\nAynı zamanda usta yazarın öykülerinden yola çıkılarak Uğur Yücel tarafından “Karanlıkta Koşanlar” ve Cevdet Mercan tarafından “Şeytan Ayrıntıda Gizlidir” dizileri yapıldı. “Sis ve Gece” adlı romanı 2007 yılında Turgut Yasalar tarafından, “Bir Ses Böler Geceyi” ise Ersan Arseven tarafından sinemaya uyarlandı. “Şeytan Ayrıntıda Gizlidir”, “Agatha’nın Anahtarı”, “İstanbul Hatırası”, “Kavim” ve “Kırlangıç Çığlığı” kitapları radyo tiyatrosu formatına uyarlanarak NTV Radyo’da yayımlandı. “Aşk Köpekliktir” tiyatro olarak sahnelendi. “Ninatta’nın Bileziği” ise opera olarak seyirciyle buluştu. Senaryosunu Ahmet Ümit’in yazdığı, yönetmenliğini uzun yıllardır birçok belgesel hazırlamış olan Cengiz Özkarabekir’in üstlendiği “Merhaba Güzel Vatanım”ın çekimleri ise devam ediyor. Bir drama belgeseli olan “Merhaba Güzel Vatanım”, yolu Moskova’dan geçen dünya şairi Nâzım Hikmet’in hayatı ile onu örnek almış ve tıpkı onun gibi hayatının bir dönemini Moskova’da geçirmiş Ahmet Ümit’in hikâyesini konu ediyor.', 'ahmet_umit.jpg', 'E');
INSERT INTO `yazarlar` VALUES (2, 'Sir Arthur Conan', 'Doyle', '<p style=\"text-align: justify; \">\r\n	Dünyanın en muhteşem dedektifi Sherlock Holmes’ü tüm dünyayla tanışıtıran ve polisiye türünün çıtasını yükseklere çıkaran büyük yazar ve gazeteci Arthur Conan Doyle, 22 Mayıs 1859’da İskoçya’nın Edinburgh kentinde dünyaya geldi. Ailesi İrlanda kökenliydi ve oldukça varlıklılardı. Arthur Conan Doyle, tıp eğitimi gördü ve 1881 yılında Edinburgh Üniversitesi’nden mezun oldu.&nbsp;\r\n</p>\r\n<p style=\"text-align: justify; \">\r\n	Kariyerinin ilk yıllarında gemi hekimliği yaptı ve bu görevini Batı Afrika sahillerinde yerine getirdi. 1882 yılında Portsmouth şehrinde kendi kliniğini açtı ve 1885 yılında da doktor unvanını aldı. Yazar, hekimlik mesleğini sürdürürken bir yandan da hikayeler yazıyordu. Yazarın ismiyle özdeşleşmiş olan ikonik Sherlock Holmes karakteri ve dolayısıyla Sherlock Holmes kitapları 1887 yılında oluşmaya başladı.&nbsp;\r\n</p>\r\n<p style=\"text-align: justify; \">\r\n	İlk Sherlock Holmes öyküsü “Beeton Noel Yıllığı”nda yayımlanmış olan “Kızıl Dosya” isimli kısa romandı. Diğer Sherlock Holmes öyküleri “Strand” adlı bir dergide yayımlandı. Arthur Conan Doyle, Sherlock Holmes karakterini Edgar Allan Poe’nun karakterlerinden biri olan Aguste Dupin’den esinlendiğini belirtmiştir. Aguste Dupin, Poe’nın Morgue Sokağı Cinayetleri adlı kısa romanındaki baş karakterdir. Arthur Conan Doyle, 1885 yılında Loise Hawkins ile evlendi fakat kadın 1906’da verem nedeniyle hayatını kaybetti. Conan Doyle daha sonra tekrar evlendi. Yazarın ikinci eşinin adı Jean Leckie idi.&nbsp;\r\n</p>\r\n<p style=\"text-align: justify; \">\r\n	&nbsp;Yazar 1890 yılında Viyana’da göz üzerine araştırmalarda bulundu ve kısa süre sonra Londra’da optalmolog olarak çalışmaya başladı. Lakin hiçbir hasta kapısını çalmıyordu ve bu sayede yazar, edebiyat alanındaki faaliyetlerine daha çok zaman ayırabiliyordu. Conan Doyle, farklı türlerde eserler vermek istiyordu bu yüzden daha o yıllarda kült kategorisine erişmiş olan Sherlock Holmes’ün maceralarına nokta koymak istiyordu. Bu nedenle “Son Sorun” adlı bir öyküde Sherlock Holmes’ü öldüren yazar, hayranlarından büyük tepki alınca Sherlock Holmes’ü rasyonel bir hareketle hayata geri döndürdü. Sherlock Holmes’ün ölüm diyarından dönmesi Lovecraft’ın veya Mary Shelley’nin eserlerindeki gibi gotik bir temayla anlatılmıyordu elbette.&nbsp;\r\n</p>\r\n<p style=\"text-align: justify; \">\r\n	Conan Doyle, Sherlock Holmes’ün politik bir hareketle kendini ölü gösterdiği ve düşmanlarını aldattığı şeklinde bir kurguyla ikonik karakterini anlatmaya devam etti. Yazarın büyük bir başarı ve nesilden nesile giderek artan hayran kitlesi kazandığı Sherlock Holmes serisi, yazarın diğer eserlerini domine etse de Conan Doyle’un “Kayıp Dünya” adlı kitabı da iyi bilinen ve çok sevilen bir kitabıdır. Arthur Conan Doyle, Kayıp Dünya’nın dışında bir dizi roman ve kurgu dışı kitap da yazdı. Conan Doyle’un yazdığı bu kurgu dışı eserler arasında Britanya’nın Güney Afrika’da gerçekleşen Boer Savaşı’na dahil olması gerektiğini savunduğu bir kitabı da vardı. Conan Doyle, bu kitabıyla Şövalyeliğe getirildi ve “Sir” unvanı aldı. Osmanlı Padişahı Sultan II. Abdülhamit, sıkı bir polisiye hayranıydı.&nbsp;\r\n</p>\r\n<p style=\"text-align: justify; \">\r\n	Arthur Conan Doyle’u İstanbul’da ağırladı ve yazarı Mecidiye Nişanı’yla onurlandırdı. Sherlock Holmes, Padişah Sultan Abdülhamit’in Arsen Lupen ile beraber en sevdiği karakterdi. Sherlock Holmes, olağanüstü zekası, hazır cevaplılığı ve akıllardan çıkmayan sözleriyle gerçekte yaşayan bir bireyin sevilebileceği kadar çok sevilmiştir. Sherlock Holmes’ün her diyaloğu Arthur Conan Doyle sözleri olarak değil de gerçekten yaşamış bir insanın ağzından dökülen sözler gibidir. “İyi bir gözlemci tek bir ipucuna ulaştığında sadece olanları değil, gelecekte olabilecekleri de görmelidir.” Arthur Conan Doyle, I. Dünya Savaşı sırasında oğullarından birini, kardeşini ve iki yeğenini kaybedince büyük bir bunalıma girdi ve psikolojik sorunlar yaşamaya başladı. Bu doğrultuda yazar, spiritüelizme ve paranormal olgulara meyletti ve bu alanda da eserler verdi. Sir Arthur Conan Doyle, 7 Temmuz 1930 yılında kalp krizi sonucu yaşamını kaybetti.\r\n</p>', 'sir_artur_doyle.jpg', 'E');
INSERT INTO `yazarlar` VALUES (3, 'Şermin', 'Yaşar', 'Yazarlık kariyerine adım atmadan önce sosyal medyada “Oyuncu Anne” adıyla tanınmış olan Şermin Yaşar, anne-çocuk ilişkilerine dair tecrübeleri ve hassas tutumuyla alanında fark yaratan işlere imza atıyor. 2017 yılından önce kitaplarını Çarkacı soyadıyla yayımlayan yazar, çocuk gelişimi alanındaki kitaplarının yanı sıra öykü dalındaki eserleriyle de hayran kitlesini giderek genişletiyor. Yeni nesil edebiyatın kurgu ve üslup bakımından en güçlü yazarları arasında yer alan Şermin Yaşar, sizi de eşsiz kalemini keşfetmeye çağırıyor.\r\n\r\nBir Kadın, Bir Anne ve Bir Yazar\r\n\r\nGöçmen bir ailede dünyaya gelen Şermin Yaşar, Almanya’nın Başkenti Berlin’de 1982 yılında doğdu. Ailesinin Türkiye’ye dönme kararı üzerine çocukluk yıllarını Bilecik’in Kınık köyünde geçiren Yaşar, lisans öğrenimini tamamlamak üzere Isparta’ya taşındı. Burada Türk Dili ve Edebiyatı bölümünden mezun olduktan sonra, yüksek lisans öğrenimi için Ankara’ya yerleşti. Ardından kariyerine reklam sektöründe metin yazarı olarak başlangıç yaptı. Yazarlığa olan tutkusunu mesleği sayesinde daha çok keşfetme ve geliştirme fırsatı bulan Yaşar, bu sayede kariyerinde yöneticilik pozisyonlarına kadar yükseldi. \r\n\r\n2011 yılında ikiz çocuk annesi olan Şermin Yaşar, bir yıl aradan sonra üçüncü çocuğunu da dünyaya getirdi. Çocuklarının doğumu ile birlikte anneliği hayatının merkezine alan yazar, bir yandan sosyal medyada annelik deneyimlerine dair aktif olarak paylaşımlar yaparken, diğer yandan ilk kitabı Başlarım Şimdi Anneliğe’yi kaleme aldı. İlk kitabı 2015 yılında raflardaki yerini aldıktan sonra yazarlığa üretken bir şekilde devam etti. İçten dili ve çocuklarına karşı duyduğu yoğun empati duygusu ile annelere ilham olan Şermin Yaşar, aynı yıl yayımladığı Oyuncu Anne adlı kitabıyla ise yazarlık kariyerindeki en büyük yankıyı uyandırdı. Yazarın günümüzde hem çocuklar hem de yetişkinler için yazdığı pek çok güçlü eser bulunuyor.\r\n\r\nModern Türk Kadınına Güçlü Bir Örnek…\r\n\r\nŞermin Yaşar, başarılarla dolu kariyeri ve özenli anneliği ile modern kadının en güçlü temsilcileri arasında yer alıyor. Siz de bu çok yönlü yazarın benzersiz eserleri ile tanışmak için daha fazla geç kalmayın! Şermin Yaşar’ın birbirinden keyifli ve sürükleyici kitapları, sayfanın hemen aşağısında keşfedilmeyi bekliyor!', 'sermin_yasar.jpg', 'K');
INSERT INTO `yazarlar` VALUES (4, 'Gürbüz', 'Azak', '1938 yılında Denizli\'nin Acıpayam ilçesinde doğdu. Zehra ve İbarahim Azak\'ın oğlu. Denizli Lisesi ve İstanbul Güzel Sanatlar Akademisi\'nin yüksek mimarlık bölümünde okudu. 1960 yılında Hür Vatan gazetesinde grafiker olarak gazetecilğe başladı. Yeni İstanbul, Baıali\'de Sabah, Yeni Asya, Tecüman gazetelerinde çalıştı. Türkiye gazetesinde köşe yazarlığı yaptı. Evli ve iki çocuk babası. Eserleri: Daha önce çok sayıda eseri yayınlanan yazarın, \"Dünyayı Ölüler Yönetir\" adlı kitabı, Emre Yayınları\'nda çıkan ilk kitabıdır.', 'gurbuz_azak.jpg', 'E');
INSERT INTO `yazarlar` VALUES (5, 'Ayşe', 'Kulin', 'Ayşe Kulin 1941 tarihinde İstanbul’da dünyaya geldi. Lise öğrenimini Amerikan kız Koleji’nde tamamladı. Buradaki eğitim sürecinde yazar olmaya karar verdi. Eşiyle beraber Londra’ya yerleştikten sonra burada London School of Economics’te sosyoloji eğitimi aldı.\r\n\r\n Yazar, çeşitli gazete ve derğilerde editör ve muhabir olarak çalıştı.\r\n\r\nAyşe Kulin’in öykülerden oluşan ilk kitabı 1984 yılında yayımlandı. Bu kitapta yer alan “Gülizar” adlı öykü, 1987 yılında Nisan Akman yönetmenliğinde beyaz perdeye uyarlandı ve film, 1986 yılında Kültür Bakanlığı Ödülü’nü kazandı.\r\n\r\n1997 yılında yayımlanan “Adı: Aylin” kitabı ile İstanbul İletişim Fakültesi tarafından yılın yazarı seçildi. Bu kitap, yazarın geniş kitleler tarafından tanınmasına ve okuyucu kitlesini oluşturmasında büyük rol oynadı.\r\n\r\nYazar, 2001 yılında yayımlamış olduğu Köprü isimli romanında Türkiye’nin Doğu illerinde yaşanan dramı ele aldı. Bu roman, 2006 – 2008 yılları arasında TV dizisi olarak uyarlanarak ekranlarda yer aldı. Dizinin başrolünde yer alan Erdal Beşikçioğlu’nun usta oyunculuğu hâlâ akıllardan çıkmamaktadır.\r\n\r\nAyşe Kulin’in, 2004 yılında yayımlamış olduğu Gece Sesleri romanı, 2008 ve 2009 yıllarında TV dizisi olarak uyarlanarak ekranlarda yer aldı. Yine 2009 yılında yazdığı Tek Ve Tek Başına Türkan adlı biyografik romanı, aynı adla televizyona uyarlanarak 2010 ve 2011 yılları arasında ekranlarda yer aldı.', 'ayse_kulin.jpg', 'K');
INSERT INTO `yazarlar` VALUES (6, 'Jack', 'London', 'Amerika’nın ikonik romancısı, kısa hikaye yazarı ve aktivist Jack London; en çok 1903 yılında yayımlanan “Vahşetin Çağrısı” ve 1906 tarihli “Beyaz Diş” adlı eserleriyle tanınmaktadır.\r\n\r\nJack London, 12 Ocak 1876’da California eyaletinin San Francisco şehrinde dünyaya geldi. Jack London’ın annesi Flora Wellman’ın ve babası William Henry Chaney’nin evli olup olmadıkları kesin olarak bilinmemektedir. Chaney, Flora’yı terk ettiğinde Flora, John London’la evlendi ve Jack, onun soyadını aldı. Flora’nın ikinci evliliği Jack’e iki üvey kız kardeş getirdi. Kız kardeşlerinin adı Eliza ve Ida’ydı. Aile, Jack London’ın mezun olduğu ilkokulun bulunduğu Oakland’e yerleşene kadar birkaç kez taşındılar. Düşük gelirli bir işçi sınıfı ailesine mensup olan Jack London, ailesinin gelirine katkıda bulunmak için 10 yaşındayken “gazeteci çocukluk” yapmak zorunda kaldı.\r\n\r\nZor bir çevrede yaşam sürmesine ve her gün yaşama tutunmak için savaş vermesine rağmen Jack, asla yılmadı ve geleceği için ümitli bir çocuk olarak yaşamaya devam etti. Okumaya ve yazmaya oldukça düşkündü. Oakland’de bir kütüphaneyi keşfettikten sonra edebiyat dünyasının içinde kaybolmaya başladı. Bu sıralarda Jack London kâh konserve fabrikasında, kâh hint keneviri değirmeninde çalıştı. Pencere silmekten, bekçiliğe kadar çeşitli işlerde geçimini sağlamaya çalıştı. Bu sırada denize açılmayı da öğrenmekten geri kalmayan Jack London, borç parayla ucuz bir şalopa satın aldı ve körfezde istiridye avladı. Ne yazık ki işler iyi gitmedi ve Jack London, yeni geçim kapısı olan küçük yelkenli şalopayı çaldırdı ve dilencilik yapmaya başladı. Jack London’ın bu sıkıntılı günleri, yazarın toplumsal sınıf sistemine ve insan davranışına karşı görüşlerinin oluşmasına neden oldu.\r\n\r\nDaha iyi bir hayat yaşama arzusuyla California’ya döndü ve Berkeley’deki California Üniversitesi’ne girdi. Ne yazık ki ekonomik problemler nedeniyle okulu bırakmak zorunda kaldı.\r\n\r\nJack London, eğitim yıllarını çalışarak geçiriyordu ve bu arada uzun bir süre yazmayla meşgul olmuştu. 1893 yılında kaleme aldığı Typhoon Off the Coast of Japan (Japonya Kıyısını Vuran Tayfun) adlı öyküyü Sibirya ve Japonya sahillerine açıldığı şalopasında yazmıştı. Bunun ardından Jack London, yazmayı daha ciddiye aldı ve yazar olarak başarılı bir kariyere başlamış oldu. 1896 yılında Sosyalist İşçi Partisi’ne katılan Jack London’ın sosyalist görüşleri 1908 yılında yayımlanan ünlü Demir Ökçe romanında rahatlıkla görülebilir.\r\n\r\nJack London, 1987 yılında Altına Hücum Dönemi’nde Londra’yı terk edip Klondike’ye gitti; fakat orada altın bulamayıp bu da yetmezmiş gibi hastalandı. Zorlu bir kış mevsiminin ardından London, Ateş Yakmak adlı öyküsünü kaleme aldı. Yazıları önemli aylık dergiler olan The Overland’de ve The Atlantic’te yayımlandı. Altına Hücum olayında yaşadığı deneyimleri anlatığı kitaplarla güzel gelir elde etti.\r\n\r\nOldukça zorlu bir hayat geçiren Jack London, yazarlıkla gelir elde eden ender yazarlardandı. Günümüzde Jack London Devlet Tarihi Parkı olarak anılan çiftliğinde 22 Kasım 1916’da hayata gözlerini yumana dek düzinelerce öykü ve kitap yazdı.', 'jack_london.jpg', 'E');
INSERT INTO `yazarlar` VALUES (7, 'Cahit', 'Zarifoğlu', 'Kendi dilinden...\r\n\r\n\'1940\'ta Ankara\'da doğdum. Rahmetli babam hakimdi. Bu vesile ile çocukluğum Güneydoğu\'da geçti. İlkokula Siverek\'te başladım. Maraş ve Ankara\'da bitirdim. Ortaokula ise Kızılcahamam\'da başladım, liseyi Maraş\'ta tamamladım. Aslen Maraşlıyım.\r\n\r\nCeddimiz 300 yıl kadar önce Kafkasya\'dan Maraş\'a gelip yerleşmişler. Bunlar üç kardeşmiş ve içlerinden birinin adı Zarif\'miş. İşte bizim aile bu Kafkasyalı Zarif\'ten geliyor. Daha çok bu sebeple olacak Kafkasya\'yı çok seviyorum.\r\n\r\nEdebiyata lise yıllarında şiir ve kompozisyonlar yazarak başladım.\r\nUsta hikayeci Rasim Özdenören, şair Erdem Beyazıt, şair Alaaddin Özdenören ile aynı sıralarda okuduk.\r\nLiseden sonra İstanbul Üniversitesi Edebiyat Fakültesi Alman Dili ve Edebiyatı\'nı bitirdim.\r\nÖğrenciliğim sırasında çalışmak zorundaydım. Muhtelif gazetelerde sayfa sekreteri olarak çalıştım. Bu yüzden tahsilim biraz ağır aksak ilerledi. Bütün bunlar zarfında vazgeçmediğim,değişmeyen, istikrarlı bir yönüm vardı, o da şairliğim ve yazarlığımdı.\r\n\r\nBir yerde çok titiz bir insanım, bir bakıma da hiç titiz değilim. Görünüşte bir düzensizlik içindiyim, ama her şey zihnimde benim de şaştığm bir disiplin ve düzen içindedir. Şu masanın halini görüyorsun. Çekmecelerde öyle. Ama söyleyin bir şey onu gözüm kapalı çıkarayım. Hayatım da öyle. Bir telaş içinde parçalanmış gibiyim. Ama saati saatine programlanmışımdır.\r\nŞiiri de ne zaman yazacağımı bilmiyorum. Memur gibi. Durum öyle gerektiriyor.\r\n\r\nSezai Karakoç ağabeyin yayınladığı Diriliş dergisinde şiirlerim yayınlandı. Ağabeyin sohbetlerinden ve yazdıklarından çok şeyler öğrendik. Her anlamda bizim hocamızdı. Yetişmemizde çok büyük faydası oldu. Sonra Nuri Pakdil ve arkadaşlarının yayınladığı Edebiyat dergisinde yazdım. 1976\'dan itibaren ise ben, Erdem Beyazıt, Rasim Özdenören, Akif İnan ve Nazif Gürdoğan\'nın kurucuları olduğu Mavera dergisinde şiirlerim, 1-2 hikayem, senaryo çalışmalarım, günlüklerim ve Okuyucularla ismini verdiğimiz sohbetlerim yayınlandı. Birkaç yıldan beri ise roman çalışıyorum. Bunlardan ilki Savaş Ritimleri 1985\'te yayınlandı. Ayrıca çocuk edebiyatı dalında kitaplar yazdım.\'\r\n\r\nDeğişik dönemlerde ilkokul öğretmen vekilliği ve Almanca öğretmenliği yapan Cahit Zarifoğlu, 1976\'dan itibaren TRT Genel Müdürlüğü\'nde mütercim sekreter olarak görev aldı. Farklı gazete ve dergilerde yazıları yayımlandı. Mavera dergisini arkadaşlarıyla birlikte yayımladı. Zaman gazetesi ve Mavera dergisinde Okuyucularla başlığıyla hayli ilgi toplayan ve bir \'mektep\' özelliği taşıyan sohbet köşelerini düzenledi. 1983\'te TRT İstanbul Radyosu\'nda görev aldı. Radyo oyunları yazdı. 1984\'te Türkiye Yazarlar Birliği Çocuk Edebiyatı Ödülü\'nü alan Zarifoğlu, 7 Haziran 1987\'de Yâr\'ine kavuştu.', 'cahit_zarifoglu.jpg', 'E');
INSERT INTO `yazarlar` VALUES (8, 'Gülseren', 'Budayıcıoğlu', ' Mesleki tecrübelerinden yola çıkarak yazdığı güçlü eserlerle geniş bir okuyucu kitlesine ulaşan Psikiyatr Dr. Gülseren Budayıcıoğlu, çağdaş Türk edebiyatının en çok takip edilen yazarları arasında yer alıyor. Kitapları televizyon dizilerine de uyarlanan yazar, gerçeklerden yola çıkan çarpıcı kurguları ve akıcı üslubuyla okurlarına birbirinden sürükleyici hikayeler sunuyor.\r\n\r\nBudayıcıoğlu, eserlerinde ağırlıklı olarak karşılaştığı ilginç psikiyatri vakalarını ve danışanlarının yaşam öykülerini aktarıyor. Bu yönüyle yazar, okurlarını da etkileyici birer terapi niteliği taşıyan eserlerle buluşturuyor. Siz de insan psikolojisini hayatın dinamikleri ve zengin bir anlatımla bir arada okumak isteyenlerdenseniz, Gülseren Budayıcıoğlu’nun kitaplarıyla tanışmak için daha fazla beklemeyin!\r\n\r\nBilimsel, Sosyal ve Edebi Açıdan İletişime Adanmış Bir Yaşam\r\n\r\nGülseren Budayıcıoğlu, 1947 yılında Ankara’da dünyaya geldi. Annesi, babası ve iki kardeşiyle birlikte çocukluk yıllarını başkentin Cebeci ilçesinde geçirdi. Ortaokul ve lise öğrenimini TED Ankara Koleji’nde tamamlayan Budayıcıoğlu, edebiyata olan ilgisini de bu yıllarda keşfetti. Ancak ailesi ve okuldaki üstün başarıları, onu lisans öğrenimi için tıp bölümünü seçmeye yöneltti. Budayıcıoğlu, böylece Ankara Üniversitesi Tıp Fakültesi’ne kayıt yaptırdı. Ayrıca öğrenimi sırasında TRT’nin açtığı spikerlik kursuna da kaydoldu.\r\n\r\nBudayıcıoğlu, TRT’deki beş yıllık spikerlik ve sunuculuk deneyiminin ardından 1972’de lisans öğrenimini tamamladı. Ardından Hacettepe Üniversitesi Tıp Fakültesi’nin Psikiyatri Bölümü’nde asistan olarak çalışmaya başladı. 10 yıllık akademi kariyerinin ardından üniversiteden ayrılarak doktorluğa yöneldi. Mesleğini 23 yıl boyunca icra ettikten sonra 2005’te kendisine ait bir psikiyatri merkezi kurdu. “Madalyon Psikiyatri Merkezi” adıyla günümüzde de faaliyet gösteren bu kurum, isim olarak Budayıcıoğlu’nun 2004’te yayımladığı ilk kitabından da izler taşıyor: Madalyonun İçi…\r\n\r\nMesleki Birikim ve Kalem Ustalığı ile Ortaya Çıkan Unutulmaz Eserler\r\n\r\nMadalyonun İçi ile yazarlığa ilk adımını atan Gülseren Budayıcıoğlu, dört yıl aradan sonra Günahın Üç Rengi, Madalyonun Öteki Yüzü adlı kitabını da yayımladı. Sonraki yıllarda bu eserleri Hayata Dön, Kral Kaybederse ve Camdaki Kız takip etti. Tüm kitaplarında engin mesleki deneyimlerinin yanı sıra kaleminin gücünü de yeniden ispatlayan Gülseren Budayıcıoğlu, hayatı ve kendinizi daha derinlemesine kavrayabilmeniz için sizi kitapları ile tanışmaya davet ediyor.', 'gulseren_bugdaycioglu.jpg', 'K');

SET FOREIGN_KEY_CHECKS = 1;
