-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2015 at 05:28 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `traicay`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE IF NOT EXISTS `adm` (
`ma_adm` int(11) NOT NULL,
  `ten_dn` varchar(30) NOT NULL,
  `level` int(10) NOT NULL,
  `mat_khau` varchar(30) NOT NULL,
  `ho` varchar(30) NOT NULL,
  `ten` varchar(30) NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`ma_adm`, `ten_dn`, `level`, `mat_khau`, `ho`, `ten`, `gioi_tinh`) VALUES
(1, 'admin', 1, 'admin', 'Hoàng Thành ', 'Trung', 2),
(7, 'tungit', 2, '123456', 'hoang van', 'tung', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ct_dondathang`
--

CREATE TABLE IF NOT EXISTS `ct_dondathang` (
  `ma_dh` int(10) NOT NULL,
  `ma_qua` varchar(10) NOT NULL,
  `gia_ban` float NOT NULL,
  `sl_dat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ct_dondathang`
--

INSERT INTO `ct_dondathang` (`ma_dh`, `ma_qua`, `gia_ban`, `sl_dat`) VALUES
(40, '40', 25000, 10),
(40, '41', 120000, 1),
(40, '21', 50000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE IF NOT EXISTS `dondathang` (
`ma_dh` int(10) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ngay_dh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ngay_gh` varchar(10) NOT NULL,
  `noi_giao` varchar(300) NOT NULL,
  `hien_trang` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`ma_dh`, `ma_kh`, `ngay_dh`, `ngay_gh`, `noi_giao`, `hien_trang`) VALUES
(40, 46, '2015-06-09 08:32:01', '09/06/2015', 'Đống Đa-Hà Nội ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE IF NOT EXISTS `khach_hang` (
`ma_kh` int(11) NOT NULL,
  `ho_kh` varchar(30) NOT NULL,
  `ten_kh` varchar(30) NOT NULL,
  `sdt` int(11) NOT NULL,
  `dia_chi` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gioi_tinh` int(11) NOT NULL DEFAULT '0',
  `ten_dn` varchar(15) NOT NULL,
  `mat_khau` varchar(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ho_kh`, `ten_kh`, `sdt`, `dia_chi`, `email`, `gioi_tinh`, `ten_dn`, `mat_khau`) VALUES
(47, 'hoang', 'trung', 1325454365, 'ưerwerwre ', 'trangdoantyck57@gmail.com', 2, 'tungit', '123456'),
(46, 'hoàng Văn', 'Quyền', 129864247, 'Khâm Thiên- Đống Đa', 'quyen123@gmail.com', 2, '123456', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `lien_he`
--

CREATE TABLE IF NOT EXISTS `lien_he` (
`ma_lh` int(11) NOT NULL,
  `ten_nguoi_lh` varchar(40) NOT NULL,
  `sdt_nguoi_lh` varchar(12) NOT NULL,
  `email_nguoi_lh` varchar(50) NOT NULL,
  `gioi_nguoi_lh` int(11) NOT NULL,
  `diachi_nguoi_lh` varchar(200) NOT NULL,
  `noi_dung` varchar(1000) NOT NULL,
  `ngay_lh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lien_he`
--

INSERT INTO `lien_he` (`ma_lh`, `ten_nguoi_lh`, `sdt_nguoi_lh`, `email_nguoi_lh`, `gioi_nguoi_lh`, `diachi_nguoi_lh`, `noi_dung`, `ngay_lh`) VALUES
(16, 'Hoàng Thành Trung', '0964967129', 'hoangtrungk55@gmail.com', 2, 'Khâm Thiên-Hà Nội', 'Trang web nên bố trí và thiết kế đẹp hơn, giao diện người dùng thân thiện hơn,....', '2015-06-10 17:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `loai_qua`
--

CREATE TABLE IF NOT EXISTS `loai_qua` (
`ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(40) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_qua`
--

INSERT INTO `loai_qua` (`ma_loai`, `ten_loai`) VALUES
(1, 'Quả Miền Bắc'),
(2, 'Quả Miền Trung'),
(3, 'Quả Miền Nam'),
(4, 'Quả Đặc Sản Hưng Yên'),
(5, 'Quả Nhập Khẩu');

-- --------------------------------------------------------

--
-- Table structure for table `qua`
--

CREATE TABLE IF NOT EXISTS `qua` (
`ma_qua` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ten_qua` varchar(30) NOT NULL,
  `gia` float NOT NULL,
  `hinh_anh` varchar(100) NOT NULL,
  `mo_ta` varchar(300) NOT NULL,
  `ngay_d` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `trang_thai` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qua`
--

INSERT INTO `qua` (`ma_qua`, `ma_loai`, `ten_qua`, `gia`, `hinh_anh`, `mo_ta`, `ngay_d`, `trang_thai`) VALUES
(40, 4, 'Ổi Đài Loan', 25000, 'oidailoan.jpg', 'Ổi Đài Loan quả to, đẹp, ăn vừa giòn,vừa ngọt', '2015-06-07 08:41:26', 0),
(24, 4, 'Táo Giống Mới', 50000, 'taogiongmoi.jpg', 'Táo giống mới được lai ghép và trồng nhiều ở khu vực Văn Giang-Hưng Yên', '2015-06-07 14:42:30', 0),
(23, 4, 'Nhãn Lồng', 80000, 'nhanlonghungyen.jpg', 'Nhãn Lồng Hưng Yên, một loại sản vật cực kỳ thơm ngon vào dịp hè về.', '2015-06-07 14:54:48', 1),
(22, 1, 'Vải Thiều', 15000, 'Vải Thiều.jpg', 'Vải Thiều một loại sản vật ở vùng đất Hải Dương.', '2015-06-07 15:02:05', 1),
(21, 3, 'Bưởi Năm Roi', 50000, 'buoinamroi.jpg', 'Bưởi Năm Roi được nhập từ khu vực Vĩnh Long', '2015-06-07 15:17:59', 0),
(41, 5, 'Bơ Sáp Hà Lan', 120000, 'Bơ Sáp.jpg', 'Loại bơ sáp này được xuất sứ từ đất nước Hà Lan', '2015-06-09 04:43:09', 0),
(42, 2, 'Măng Cụt', 50000, 'Măng cụt 1.JPG', 'Măng cụt là loại trái cây cực kỳ thơm ngon và bổ dưỡng.', '2015-06-09 04:51:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tin_tuc`
--

CREATE TABLE IF NOT EXISTS `tin_tuc` (
`ma_tt` int(11) NOT NULL,
  `tieu_de` varchar(50) NOT NULL,
  `hinh_anh` varchar(100) NOT NULL,
  `noi_dung` varchar(10000) NOT NULL,
  `ngay_dang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tin_tuc`
--

INSERT INTO `tin_tuc` (`ma_tt`, `tieu_de`, `hinh_anh`, `noi_dung`, `ngay_dang`) VALUES
(34, 'Công dụng đáng kinh ngạc từ trái ổi.', 'cayoidailoan.jpg', '<p style="margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:\r\n0cm;line-height:13.15pt;background:white">&nbsp;Không chỉ là một loại hoa quả\r\nthông thường mà ổi còn có thể được xem là một loại thuốc để chừa bệnh, một\r\nnguồn cung cấp chất dinh dưỡng cho cơ thể người. Nhiều bộ phận trên cây ổi đều\r\ncó thể dùng để làm nguyên liệu ngăn ngừa và chữa bệnh: lá, quả chín, quả non,\r\nhạt,...</p>\r\n\r\n<p style="margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:\r\n0cm;text-align:justify;line-height:13.15pt;background:white"><strong><i>Ngăn\r\nngừa ung thư</i></strong></p>\r\n\r\n<p style="margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:\r\n0cm;text-align:justify;text-indent:36.0pt;line-height:13.15pt;background:white">Qua\r\ncác nghiên cứu y học cho thấy thành phần chiết xuất từ lá ổi có thể giúp ngăn\r\nngừa bệnh ung thư. Hơn nữa, ruột quả ổi cũng chứa chất lypocene cao, tác dụng\r\nchống ung thư. Folate trong ổi cũng giúp ngăn ngừa ung thư dạ dày.</p>\r\n\r\n<p style="margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:\r\n0cm;text-align:justify;line-height:13.15pt;background:white"><strong><i>Ngăn\r\nngừa táo bón</i></strong></p>\r\n\r\n<p style="margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:\r\n0cm;text-align:justify;text-indent:36.0pt;line-height:13.15pt;background:white">Quả\r\nổi có chứa nhiều chất xơ nên có tác dụng phòng ngừa bệnh táo bón. Hạt của quả\r\nổi cũng có tác dụng hiệu quả trong việc nhuận tràng và làm sạch hệ thống đường\r\nruột.</p><p style="margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:\r\n0cm;text-align:justify;line-height:13.15pt;background:white"><strong><i>Điều\r\ntrị bệnh tiểu đường</i></strong></p><p style="margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:\r\n0cm;text-align:justify;text-indent:36.0pt;line-height:13.15pt;background:white">Nghiên\r\ncứu của các nhà khoa học Ấn Độ cho thấy lá và quả ổi có khả năng giảm thiểu\r\nlượng đường gluco trong máu.</p><p style="margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:\r\n0cm;text-align:justify;line-height:13.15pt;background:white"><strong><i>Điều\r\ntrị bệnh cao huyết áp</i></strong></p><p style="margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:\r\n0cm;text-align:justify;text-indent:36.0pt;line-height:13.15pt;background:white">Quả\r\nổi chứa chất hypoglycemic tự nhiên và giàu chất xơ. Ổi có tác dụng hạ huyết áp\r\nvà cholesterol trong máu.Vì vậy, ổi rất có ích đối với những người có nguy cơ\r\nmắc bệnh tim và cao huyết áp.</p><p style="margin-top:0cm;margin-right:0cm;margin-bottom:15.0pt;margin-left:\r\n0cm;text-align:justify;line-height:13.15pt;background:white"><strong><i>Giảm\r\nđau, chống viêm</i></strong></p>', '2015-06-07 05:59:53'),
(33, 'Chọn bưởi ngon không khó.', 'caybuoidien.jpg', '<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;text-align:\r\njustify;line-height:13.15pt;mso-outline-level:4;background:white;vertical-align:\r\ntop"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><a href="http://www.caygiong.org/default.asp?tab=detailnews&amp;zone=5&amp;id=60&amp;tin=705&amp;title=huong-dan-cach-chon-buoi-ngon" target="_blank"><span style="mso-fareast-font-family:&quot;Times New Roman&quot;;\r\ncolor:windowtext;text-decoration:none;text-underline:none">Chúng tôi tin chắc\r\nnhững thông tin dưới đây sẽ thật sự hữu ích cho các chị em nội trợ, chọn được\r\nnhững quả bưởi thơm ngon và dinh dưỡng nhất</span></a></span><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;"><o:p></o:p></span></p><p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;text-align:\r\njustify;line-height:13.15pt;mso-outline-level:4;background:white;vertical-align:\r\ntop">\r\n\r\n</p><p class="MsoNormal"><span style="font-size:12.0pt;line-height:115%;font-family:\r\n&quot;Times New Roman&quot;,&quot;serif&quot;;background:white">Trái bưởi ngon có những đặc điểm\r\nsau:</span><span style="font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"><br>\r\n<br>\r\n<span style="background:white">+ Cuống trái còn tươi, da căng và ửng vàng.</span><br>\r\n<br>\r\n<span style="background:white">&nbsp;+ Đều đặn, nặng hơn nhiều trái khác cùng cỡ-bạn\r\ndùng tay “cân” trái bưởi sẽ cảm nhận được điều này.</span><br>\r\n<br>\r\n<strong>+ Vỏ mỏng:&nbsp;</strong><span style="background:white">bạn dùng ngón\r\ntay búng vừa phải vào trái bưởi sẽ nghe âm thanh “cạch cạch”. Ngược lại, ở trái\r\nvỏ dày sẽ phát ra tiếng “bụp bụp”. Còn cách khác đơn giản hơn là bạn dùng ngón tay\r\nthuận bấm vừa phải vào trái bưởi. Nếu bạn cảm thấy cứng tay là được.</span><br>\r\n<br>\r\n<strong>+ Ngọt:</strong><span style="background:white">&nbsp;tiêu chí này rất\r\nkhó, trừ khi bạn xin người bán cho ăn thử. Bởi chỉ có những nhà vườn biết bón\r\ncân đối lượng phân (đạm, lân, kali) cho cây thì mới thu được trái ngọt. Hoặc bạn\r\ncứ chọn mua trái này ở những nơi bán uy tín như trong các hệ thống siêu thị, chỗ\r\nmua “mối”.</span><br>\r\n<br>\r\n<span style="background:white">Thường thời điểm chín rục của các loại bưởi là\r\n7-10 ngày, sau khi nhà vườn hái xuống. Do vậy nếu mua bưởi ăn liền, bạn nên chọn\r\nnhững trái da nhăn, vàng sậm-vừa ngon vừa lợi ký. Lúc đó, cơm bưởi ngọt thanh,\r\nnhiều nước, thơm phảng phất.</span><br>\r\n<br>\r\n<span style="background:white">Bảo quản nước bưởi: Theo BS.Nguyễn Ý Đức, nước\r\nbưởi cần được đựng trong bình (cốc) thủy tinh, để trong tủ lạnh. Tránh mất\r\nvitamin C, bạn nên đổ nước bưởi gần đầy bình (cốc) để không bị oxy hóa.<o:p></o:p></span></span></p>', '2015-06-07 06:11:24'),
(35, 'Nhãn lồng Hưng Yên  món quà tinh túy của trời đất.', 'nhan-long.jpg', '<p style="text-align:justify;line-height:12.5pt;background:white">Từ lâu, nhãn\r\nlồng đã trở thành một đặc sản nổi tiếng của đất Hưng Yên. Cây nhãn đã bám sâu\r\nvào đời sống người dân Hưng Yên, không chỉ là sản vật biểu tượng cho những tinh\r\ntúy của vùng đất này mà còn là một loại cây mang lại giá trị kinh tế cao, cải\r\nthiện đời sống của bà con nông dân.</p>\r\n\r\n<p style="text-align:justify;line-height:12.5pt;background:white">Nhãn lồng\r\nđược trồng nhiều dọc triền đê sông Hồng, sông Luộc… Hằng năm, cứ vào tháng sáu\r\nâm lịch là nhãn lồng bắt đầu chín rộ, nhuộm vàng cả một góc trời, những quả\r\nnhãn to tròn, căng mọng. Nhãn lồng của Hưng Yên khác hẳn với những loại nhãn ở\r\ncác vùng khác, đó là nhãn khi chín có màu nâu sẫm, vỏ mỏng. Bóc một lớp vỏ mỏng\r\nbên ngoài, bên trong là lớp cùi nhẵn dày, các lớp cùi xếp lồng vào nhau căng\r\nmọng, ăn giòn, ngọt đậm và thơm dịu mát. Mùi thơm của nhãn lồng Hưng Yên rất\r\nđặc trưng, hương thơm tinh khiết, dịu mát tỏa nhẹ làm ngây ngất lòng người.\r\nNhãn lồng Hưng Yên có hương vị riêng biệt mà không loại nhãn nào sánh được, ăn\r\nvừa ngọt vừa thơm. Quả không sai khi thưởng thức nhãn lồng Hưng Yên, nhà bác\r\nhọc Lê Quý Đôn đã phải thốt lên rằng: “Mỗi lần bỏ vào miệng thì tận trong răng\r\nlưỡi đã nảy ra vị thơm tựa như nước thánh trời cho”.</p>\r\n\r\n<p style="text-align:justify;line-height:12.5pt;background:white">Mảnh đất Hưng\r\nYên nhờ thứ đặc sản này mà đã khẳng định được tên tuổi, thương hiệu của mình\r\nkhắp nơi và nhãn lồng đã vươn ra thị trường thế giới. Nhãn lồng sấy khô, dẻo\r\nquánh, có màu nâu sậm, vẫn còn nguyên hương thơm và có vị ngọt hơn đường phèn,\r\ngọi là long nhãn, đã xuất khẩu sang thị trường nước ngoài và rất được ưa\r\nchuộng. Nhãn lồng còn là một thứ thuốc quý dân gian của bà con. Người ta thường\r\nlấy long nhãn ngâm rượu để uống giúp cho tinh thần sảng khoái, ăn ngon và ngủ\r\nsâu hoặc lấy long nhãn bỏ hột lồng với hạt sen bên trong hấp chín, rồi ngâm với\r\nđường, là một món ngon giàu chất dinh dưỡng và để giải khát khi trời nóng, giải\r\nnhiệt cơ thể rất tốt. Nhãn lồng Hưng Yên luôn là một món quà quý, để người đi\r\nxa luôn phải ngóng chờ mỗi mùa nhãn đến. Ca dao xưa đã có câu:</p>\r\n\r\n<p style="text-align:justify;line-height:12.5pt;background:white"><em>Dù đi\r\nbuôn Bắc bán Đông</em></p>\r\n\r\n<p style="text-align:justify;line-height:12.5pt;background:white"><em>Đố ai\r\nquên được nhãn lồng Hưng Yên.</em></p>', '2015-06-07 07:30:43'),
(36, 'Cam Vinh và tác dụng của vitamin C.', 'camvinh.jpg', '<br><p class="MsoNormal" style="margin-bottom:5.0pt;mso-line-height-alt:10.65pt;\r\nbackground:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-weight:bold">Cam Vinh là\r\nmột trong những loại trái cây có chứa tinh dầu mang mùi thơm và chứa nhiều\r\nvitamin C, rất mát và bổ dưỡng cho cơ thể.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">- Vitamin C là thành phần cần thiết\r\ncho quy trình kiến tạo mô liên kết. Thiếu vitamin C thì vết thương, vết loét\r\nkhó lành.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">- Vitamin C cải thiện tình trạng\r\nchuyển hóa chất sắt bằng cách đẩy mạnh quy trình hấp thu chất sắt qua đường\r\ntiêu hóa cũng như dự trữ chất sắt trong gan, lá lách và tủy xương. Thiếu\r\nvitamin C thì chức năng tạo hồng huyết cầu bị đình trệ.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">- Vitamin C hưng phấn hoạt tính của\r\nbạch huyết cầu và gia tăng sự thành lập kháng thể. Thiếu vitamin C thì cơ thể\r\ndễ bị bội nhiễm. Kết quả nhiều công trình nghiên cứu cho thấy vitamin C ở liều\r\ncao, khoảng 500mg mỗi ngày, có khả năng thu ngắn thời gian nhiễm cúm.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">- Vitamin C cần thiết cho hoạt động\r\ncủa tuyến thượng thận để bài tiết kích tố chống tình trạng căng thẳng thần kinh\r\n(stress). Thiếu vitamin C thì tuyến thượng thận không thể hoạt động tối đa. Cơ\r\nthể người không đủ vitamin C vì thế khó chịu đựng lâu dài tình trạng căng\r\nthẳng. Điều đó cũng có nghĩa là ở người thường xuyên bị căng thẳng thần kinh\r\nphải được kịp thời cung ứng đầy đủ vitamin C.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">- Vitamin C yểm trợ chức năng giải\r\nđộc của gan. Vitamin C hưng phấn quy trình đào thải các kim loại nặng như chì.\r\nThiếu vitamin C thì cơ thể dễ bị dị ứng với thuốc men, thực phẩm, hóa chất.\r\nThêm vào đó, cơ thể người không có đủ vitamin C thường có khuynh hướng bị tăng\r\nchất béo cholesterol.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">- Vitamin C còn có tác dụng gia tăng\r\nđề kháng và tăng tính hấp thu chất sắt, thực vật.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp; &nbsp; &nbsp; &nbsp;Ngoài ra,\r\nnước cam còn là nguồn cung cấp phong phú kali, folate, vitamin B1, niacin,\r\nriboflavin và magiê. Vitamin B1 tham gia vào quá trình sản xuất năng lượng và\r\ngiúp các dây thần kinh hoạt động tốt. Folate có công dụng cải thiện máu và\r\nthiết thực cho thai phụ vì giúp ngừa các khiếm khuyết ở thai nhi. Nước cam còn\r\ngiúp giảm nguy cơ bị huyết áp cao và đột quỵ.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp; &nbsp; &nbsp; &nbsp;Nước ép\r\ntrái cam có độ PH hơi axit nên nếu những người bị viêm hay loét dạ dày nếu dùng\r\ncam vào lúc đói thì sẽ làm tăng thêm cảm giác cồn cào và nóng rát. Cùi cam chứa\r\nnhiều chất xenlulô hay còn gọi là chất xơ rất có giá trị trong việc nhuận\r\ntràng, kích thích sự co bóp của ruột nên có tác dụng chống táo bón và hình\r\nthành khuôn phân. Chất xơ trong cam có tác dụng hấp thụ lượng chất cholesterol\r\nhay chất béo có hại có trong ruột và đóng vai trò như một chiếc chổi quét chất\r\nđộc hại này theo phân đào thải ra khỏi cơ thể. Một thông tin gần đây nhất cho\r\nbiết, chỉ cần một trái cam trong một ngày (dùng theo cách gọt vỏ và ăn cả cùi) là\r\nđã có khả năng phòng chống được bệnh ung thư ruột già và các bệnh tim mạch.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp; &nbsp; &nbsp; &nbsp;Nếu thích\r\nbạn có thể ăn 2-3 quả cam trong một ngày và theo cách gọt vỏ, ăn cả cùi.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">&nbsp; &nbsp; &nbsp; &nbsp;Còn nếu\r\nhiện nay bạn ăn 5-6 quả cam một ngày thì nên vắt lấy nước kết hợp với ăn cùi vì\r\nnếu dùng quá nhiều chất xơ có thể có tai biến gây tắc ruột. Nếu em đang bị các\r\nchứng bệnh như viêm loét dạ dày, tá tràng, viêm ruột thì không nên dùng cam vào\r\nlúc đói và uống nước cam quá nhiều trong ngày. Tốt nhất là nên dùng cam sau bữa\r\năn theo kiểu ăn tráng miệng hoặc nếu dùng nhiều hơn thì không nên uống một số\r\nloại thuốc, chẳng như Tetracyclin vì dịch cam sẽ làm giảm bớt thậm chí làm mất\r\ntác dụng trị bệnh của thuốc.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">- Nhu cầu về vitamin C trung bình\r\ncho người không phải làm việc nặng là 75mg/ngày.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">- Thai sản phụ có nhu cầu vitamin C\r\ncao hơn, khoảng 100-130mg mỗi ngày.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">- Bệnh nhân có nhu cầu chống bội\r\nnhiễm, dự phòng ung thư, kháng dị ứng sẽ cần tối thiểu 150mg vitamin C mỗi\r\nngày.<o:p></o:p></span></p>\r\n\r\n<p class="MsoNormal" style="margin-bottom:0cm;margin-bottom:.0001pt;mso-line-height-alt:\r\n10.65pt;background:white"><span style="font-size:12.0pt;font-family:&quot;Times New Roman&quot;,&quot;serif&quot;;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;">- Người nghiện thuốc lá, vận động\r\nviên, bệnh nhân trong giai đoạn hồi phục, công nhân lao động nặng nên được tiếp\r\ntế mỗi ngày với 200mg vitamin C.<o:p></o:p></span></p><table class="MsoNormalTable" border="0" cellpadding="0"><tbody><tr><td style="padding:0cm 0cm 0cm 0cm"><br></td><td style="padding:0cm 0cm 0cm 0cm"><br></td></tr></tbody></table>', '2015-06-07 07:43:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
 ADD PRIMARY KEY (`ma_adm`), ADD UNIQUE KEY `ten_dn` (`ten_dn`);

--
-- Indexes for table `dondathang`
--
ALTER TABLE `dondathang`
 ADD PRIMARY KEY (`ma_dh`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
 ADD PRIMARY KEY (`ma_kh`), ADD UNIQUE KEY `ten_dn` (`ten_dn`);

--
-- Indexes for table `lien_he`
--
ALTER TABLE `lien_he`
 ADD PRIMARY KEY (`ma_lh`);

--
-- Indexes for table `loai_qua`
--
ALTER TABLE `loai_qua`
 ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `qua`
--
ALTER TABLE `qua`
 ADD PRIMARY KEY (`ma_qua`);

--
-- Indexes for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
 ADD PRIMARY KEY (`ma_tt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
MODIFY `ma_adm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dondathang`
--
ALTER TABLE `dondathang`
MODIFY `ma_dh` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `lien_he`
--
ALTER TABLE `lien_he`
MODIFY `ma_lh` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `loai_qua`
--
ALTER TABLE `loai_qua`
MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `qua`
--
ALTER TABLE `qua`
MODIFY `ma_qua` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tin_tuc`
--
ALTER TABLE `tin_tuc`
MODIFY `ma_tt` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
