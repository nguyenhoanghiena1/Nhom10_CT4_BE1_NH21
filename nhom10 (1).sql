-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 02, 2021 lúc 03:08 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom10`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_ID`, `manu_name`, `manu_img`) VALUES
(1, 'Apple', 'apple.jpg'),
(2, 'Samsung', 'samsung.png'),
(3, 'Oppo', 'logo-oppo.jpg'),
(4, 'Huawei', 'huw.jpg'),
(5, 'Xiaomi', 'logoxiaomi.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `manu_ID` int(11) NOT NULL,
  `type_ID` int(11) NOT NULL,
  `feature` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `name`, `price`, `image`, `description`, `manu_ID`, `type_ID`, `feature`, `created_at`) VALUES
(1, 'Macbook Pro 13 Touch Bar i5 1.4GHz/8G/256GB (2019)', 39990000, 'MacbookPro13TouchBari5 1.4GHz-8G-256GB(2019).png', 'Chiếc laptop cao cấp MacBook Pro 13 Touch Bar (2019) là tất cả những gì bạn cần cho công việc với thiết kế nhỏ gọn đề cao tính di động, màn hình Retina True Tone hoàn hảo và Touch Bar tiện lợi.', 1, 2, 1, '2021-11-24 09:14:31'),
(2, 'iPhone 6s Plus 32GB', 9990000, 'iPhone6sPlus32GB.jpg', 'Apple iPhone 6s Plus là chiếc iPhone màn hình lớn nhất, cho phép người dùng làm được nhiều việc hơn trên không gian rộng lớn. Ngoài ra, những tính năng mới như hệ điều hành iOS 10, 3D Touch, Live Photos hay camera 12MP xuất sắc sẽ mang đến sự hài lòng nhất cho bạn khi sử dụng một chiếc smartphone thực sự cao cấp.', 1, 1, 0, '2021-11-24 09:14:31'),
(3, 'iPhone 8 Plus 256GB', 18990000, 'iPhone8Plus256GB.jpg', 'iPhone 8 Plus 256Gb đã cập bến khá thành công trong sự mong mỏi của hội fan táo khuyết. Với những nâng cấp tuy “ít mà chất”, iPhone 8 Plus 256Gb thật sự là sự lựa chọn chính xác cho những ai đang muốn đổi mới chiếc iPhone cũ ngay bây giờ!', 1, 1, 1, '2021-11-24 09:14:31'),
(4, 'iPhone 11 Pro Max 64GB', 33990000, 'iPhone11ProMax64GB.jpg', 'Chiếc iPhone mạnh mẽ nhất, lớn nhất, thời lượng pin tốt nhất đã xuất hiện. iPhone 11 Pro Max chắc chắn là chiếc điện thoại mà ai cũng ao ước khi sở hữu những tính năng xuất sắc nhất, đặc biệt là camera và pin.', 1, 1, 0, '2021-11-24 09:14:31'),
(5, 'iPhone Xs Max 256GB', 35990000, 'iPhoneXsMax256GB.png', 'iPhone Xs Max 256GB là chiếc iPhone có màn hình lớn nhất, bộ nhớ trong dồi dào, mang trên mình những công nghệ đỉnh cao hoàn hảo.', 1, 1, 1, '2021-11-24 09:14:31'),
(6, 'Samsung Galaxy Note 10+', 26990000, 'SamsungGalaxyNote10+.png', 'Chiếc điện thoại cao cấp nhất, màn hình lớn nhất, mang trên mình sức mạnh đáng kinh ngạc của một chiếc máy tính và hệ thống 4 camera sau chuyên nghiệp, đó chính là Samsung Galaxy Note 10+, nơi quyền năng mới được thể hiện.', 2, 1, 1, '2021-11-24 09:14:31'),
(7, 'Samsung Galaxy S9+', 19990000, 'SamsungGalaxyS9+.png', 'Samsung Galaxy S9+ xứng danh siêu phẩm với khả năng chụp ảnh tuyệt đỉnh, màn hình vô cực ấn tượng và thiết kế mê hoặc lòng người.', 2, 1, 0, '2021-11-24 09:14:31'),
(8, 'Samsung Galaxy A70', 9290000, 'SamsungGalaxyA70.png', 'Chiếc điện thoại dành cho những điều lớn: màn hình lớn, viên pin dung lượng cao; 3 camera độ phân giải “siêu khủng”, Samsung A70 mở ra kỷ nguyên mới cho riêng bạn.', 2, 1, 0, '2021-11-24 09:14:31'),
(9, 'Samsung Galaxy A50', 6990000, 'SamsungGalaxyA50.png', 'Tận hưởng tất cả những công nghệ mới nhất trong tầm giá hấp dẫn, Samsung Galaxy A50 sở hữu cảm biến vân tay trong màn hình, 3 camera và nhiều hơn thế nữa.', 2, 1, 1, '2021-11-24 09:14:31'),
(10, 'Samsung Galaxy A20', 4190000, 'SamsungGalaxyA20.png', 'Siêu phẩm di động hấp dẫn nhất phân khúc tầm trung đã xuất hiện, Samsung A20 là sản phẩm hội tụ đầy đủ mọi ưu điểm trong mơ của một chiếc smartphone với mức giá hấp dẫn, màn hình lớn hơn bao giờ hết, dung lượng pin “khủng” và khả năng chụp ảnh', 2, 1, 0, '2021-11-24 09:14:31'),
(11, 'Oppo Reno 10x Zoom', 20990000, 'Oppo Reno 10x Zoom.png', 'Với OPPO Reno 10x Zoom, bạn có thể quan sát thế giới từ một góc nhìn hoàn toàn mới với công nghệ camera \"siêu đỉnh\".', 3, 1, 0, '2021-11-24 09:14:31'),
(12, 'OPPO A7', 4990000, 'OPPO A7.png', 'OPPO A7 là một tuyệt tác về thiết kế với màn hình “giọt nước” thời trang, màu sắc lạ mắt. Hơn thế nữa máy còn sở hữu camera xuất sắc và viên pin dung lượng cao đến khó tin.', 3, 1, 1, '2021-11-24 09:14:31'),
(13, 'Oppo A3s 16GB', 2990000, 'Oppo A3s 16GB.jpg', 'Một màn hình lớn cực đã, thời lượng pin siêu dài và camera kép đẳng cấp trong tầm giá rẻ, đó là OPPO A3s, chiếc điện thoại thời trang được ưa chuộng bậc nhất hiện nay.', 3, 1, 0, '2021-11-24 09:14:31'),
(14, 'OPPO F11 Pro 128GB', 8490000, 'OPPO F11 Pro 128GB.png', 'Phiên bản bộ nhớ trong cực lớn OPPO F11 Pro 128GB vẫn có giá bán rất hấp dẫn, nhưng cho phép bạn lưu trữ được nhiều hơn, đặc biệt là những bức ảnh chụp từ camera 48MP đẳng cấp.', 3, 1, 0, '2021-11-24 09:14:31'),
(15, 'OPPO A1k', 3190000, 'OPPO A1k.png', 'Chiếc điện thoại thời trang đầy phong cách nhưng lại sở hữu thời lượng pin đáng nể, OPPO A1K mang đến nguồn năng lượng bất tận cho giới trẻ, để bạn thoải mái sử dụng trong suốt cả ngày dài.', 3, 1, 1, '2021-11-24 09:14:31'),
(16, 'Huawei P30 Pro', 20690000, 'Huawei P30 Pro.png', 'Với Huawei P30 Pro, hãng cho thấy tầm nhìn rộng lớn của hãng khi mang loạt tính năng của tương lai cùng với những công nghệ chụp ảnh hiện đại nhất gói gọn vào chiếc điện thoại sang trọng này.', 4, 1, 0, '2021-11-24 09:14:31'),
(17, 'Huawei Y9 (2019)', 4490000, 'Huawei Y9 (2019).png', 'Huawei Y9 2019 sở hữu màn hình siêu lớn tới 6,5 inch và 4 camera AI, mang đến cho bạn những trải nghiệm đáng kinh ngạc.', 4, 1, 0, '2021-11-24 09:14:31'),
(18, 'Xiaomi Mi 9 64GB', 11990000, 'Xiaomi Mi 9 64GB.png', 'Điện thoại cao cấp nhất của Xiaomi đã xuất hiện, Xiaomi Mi 9 với thiết kế tuyệt mỹ, bộ vi xử lý Snapdragon 855 siêu mạnh mẽ và bộ 3 camera 48MP sẽ hoàn toàn chinh phục bạn.', 5, 1, 1, '2021-11-24 09:14:31'),
(19, 'Xiaomi Mi A2 Lite 4GB-64GB', 3690000, 'Xiaomi Mi A2 Lite 4GB-64GB.png', 'Xiaomi Mi A2 Lite mang trên mình tất cả những gì bạn cần, từ một thiết kế thời thượng, camera kép AI xuất sắc cho đến viên pin dung lượng thoải mái dùng trong 2 ngày.', 5, 1, 0, '2021-11-24 09:14:31'),
(20, 'Xiaomi Redmi Go 1GB-8GB', 1490000, 'Xiaomi Redmi Go 1GB-8GB.png', 'Mang trải nghiệm thông minh của smartphone đến với mọi người, đó là lý tưởng của Xiaomi Redmi Go, chiếc điện thoại chất lượng được bán ở mức giá siêu rẻ.', 5, 1, 0, '2021-11-24 09:14:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_img` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_ID`, `type_name`, `type_img`) VALUES
(1, 'Điện thoại', 'dienthoai.jpg'),
(2, 'LapTop', 'laptop.png'),
(3, 'Tablet', 'tablet.jpg'),
(4, 'Phụ kiện', 'phukien.jpg'),
(5, 'PC', 'pc.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `quyen` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`quyen`, `username`, `password`, `email`, `ID`) VALUES
(NULL, 'hung truong', '$2y$10$kVSMMbllFyAzvnfTTsH//uzIjeiyQA687X0rsP85WITe0P77Sb81K', 'truonggiahung@gmail.com', 3),
(NULL, 'huu thinh', '$2y$10$QPdZ6m3cClY94ToPvvQ06Oao5rLSgXWmM67r5r6TsYr7dxcOeJHJS', 'nguyenhuuthinh@gmail.com', 4),
(NULL, 'van chien', '$2y$10$oZjhw0p79VHCdwBrgRaEQ.b5xaYN6zFV36USm1q8Th65gceyFwprO', 'caovanchien@gmail.com', 5),
('113', 'admin', '$2y$10$M3DJMHRUWLMcggrP4GwXa.On8EF.E0qeYrF.ypas.yJNQLWS4FhR6', 'admin@gmail.com', 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
