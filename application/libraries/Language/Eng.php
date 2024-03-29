<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eng {

	public function index()
	{
		$data['indirim']	= 'Save';
		$data['bu_tura_n_kisi_bakiyor1']	= 'people are ';
		$data['bu_tura_n_kisi_bakiyor2']	= 'looking at this tour';

		$data['index']	= 'Homepage';

		$data['pay_ok_title']	= 'Thank you. Your reservation has been received.';
		$data['pay_ok_rez_no']	= 'Reservation number';
		$data['pay_ok_lead']	= 'Leader';
		$data['pay_ok_desc_1']	= 'You will receive a confirmation email after your payment has been received.';
		$data['pay_ok_desc_2']	= 'You have the right to free cancellation according to the <b>cancellation policy</b> of the tours.';
		$data['pay_ok_desc_3']	= 'You can view your reservations and make changes on the <b>"My Reservations"</b> page.';
		$data['pay_ok_print']	= 'Print my reservation';
		$data['sos_giris_son']	= 'and confirm you have read our';
		$data['sos_giris_ilk']	= 'By proceeding, you agrea to our';
		$data['onerilen_turlar']	= 'Recommended Tours';
		$data['kupon_kodu_kontrol']	= 'Check';
		$data['kupon_kodu']	= 'Promotion Code';
		$data['kupon_kodu_gir']	= 'Please enter the Promotion Code';
		$data['kupon_kodu_var_mi']	= 'Have a promo code?';
		$data['otel_adi']	= 'Hotel name';
		$data['lider_kisi_ayni']	= 'Same lider person';
		// Login patch
		$data['login_with'] = 'Continue With..';
		$data['login_with_google']	= 'Continue with Google';
		$data['login_with_facebook']	= 'Continue with Facebook';
		$data['login_with_email']	= 'Continue with email';
		$data['login_with_or']	= 'OR';
		$data['l_mail_title']	= "Join now - it's free!";
		$data['l_mail_pass_desc']	= "Password should be min 6 and max 18 characters.";

		// Language patch 
		$data['checkout_odeme_ek_bilgi']	= 'Additional information';

		//Rezervation cancellation patch
		$data['rez_iptal_durum_beklemede']	= 'Cancellation waiting for confirmation.';
		$data['rez_iptal_durum_onaylandi']	= 'Cancelled.';

		//Rezervation patch
		$data['rez_guncelle_btn']			= 'Update This Reservation';
		$data['rez_guncelle_baslik']		= 'Update this reservation';
		$data['rez_update_credit_card_btn']	= 'Update my credit card';
		$data['rez_cansel_rezerv_btn']		= 'Cancel this booking';
		$data['rez_change_date_btn']		= 'Change date';
		$data['rez_comment_btn']			= 'Comment this tour';
		$data['rez_print_btn']				= 'Print booking confirmation page';

		
		$data['rez_change_date_title']			= 'Change tour date';
		$data['rez_change_date_reason_title']	= 'What is the reason to change this reservation date? (optional)';
		$data['rez_change_date_placeholder']	= 'Write something';
		$data['rez_change_date_warning']		= 'You are about to change your booking date, you will receive an e-mail after the change confirmation.';
		$data['rez_change_date_next']			= 'Next';


		$data['rez_update_card_title']			= 'Update your credit cart information';
		$data['rez_update_card_warning']		= 'No payment will be charged from your credit card at this time. Your payment will be charged within 24 hours of the tour start time. You have the right to cancel up to 24 Hours before the tour start time.';

		$data['rez_cancel_reason']			= 'What is the reason to cancel this reservation? (optional)';
		$data['rez_cancel_warning']			= 'You are about to cancel your reservation. You will receive an e-mail after we confirm your cancellation request.';


		$data['rez_print_no']				= 'Reservation Number';
		$data['rez_print_need_make_change']	= 'Need make changes or cancel?';

		$data['rez_print_visit_booking']		= 'Visit Reservations page to update your booking.';
		$data['rez_print_tour_specific']		= 'Tour Specific Inquires';
		$data['rez_print_departure_title']		= 'Departure Details';
		$data['rez_print_departure_start_time']	= 'Departure Time';
		$data['rez_print_departure_end_time']	= 'Return Time';
		$data['rez_print_departure_point']		= 'Departure Point';
		$data['rez_print_inc_and_exc_title']	= 'Inclusions & Exclusions';
		$data['rez_print_cancel_policy_title']	= 'Cancellation Policy';
		$data['rez_print_cancel_policy_desc']	= 'For a full refund, cancel at least 24 hours in advance of the start date of the expirence.';

		$data['card_code_not_correct']		= 'Code is not correct';
		$data['card_code_enter_correct']	= 'Please Enter Correct Code';

		$data['window_error']			= 'Oops, something went wrong';
		$data['rez_enter_correct_card']	= 'Please enter correct card information..';
		$data['rez_cart_update_ok']		= 'Your card succesfully updated..';
		$data['rez_cancellation_ok']	= 'Successful, you got a cancellation mail in 24 hours';
		$data['rez_change_date_ok']		= 'Successful, you will got a info mail.';
		$data['rez_post_comment_ok']	= 'Successful, you can check the tour page.';

		// Özellikler Mıdülü
		$data['en_iyi_secim'] = 'Best Selection';
		$data['en_iyi_secim_aciklama'] = "Our strict screening process means that you are only seeing the best quality tours, activities and attractions.";
		$data['en_iyi_fiyat'] = 'Best Price Guarantee';
		$data['en_iyi_fiyat_aciklama'] = "Found a lower price elsewhere? We'll match it.";
		$data['guvenli_odeme'] = 'Secure Payments';
		$data['guvenli_odeme_aciklama'] = 'We use stripe to make your payments safe and secure.';
		$data['7_24_yardim'] = '24/7 Support';
		$data['7_24_yardim_aciklama'] = 'We are available to answer any questions or concerns via phone or email.';


		$data['lang'] = 'en';
		$data['is_onay_true'] = 'Approved';
		$data['is_onay_false'] = 'Unapproved';
		$data['admin_aciklama'] = 'Description of admin';
		$data['tursab_img'] = 'tursab-en';
		$data['whatsapp_desc'] = 'How can we help you?';
		$data['ltfn_eksk_dldr'] = 'Please fill in all fields';
		// Menu linkleri
		$data['menu'] = 'Menu';
		$data['tur'] = 'Tour';
		$data['otel'] = 'Hotel';
		$data['yrdm'] = 'Help';
		$data['spt'] = 'Cart';
		$data['rzrvsyn'] = 'Reservations';
		$data['ayr'] = 'Settings';
		$data['istek'] = 'Wishlist';
		$data['gcms'] = 'History';
		$data['cks'] = 'Exit';
		$data['grs'] = 'Login';
		$data['kayt'] = 'Register';
		$data['tr'] = 'Türkçe';
		$data['eng'] = 'English';
		$data['cin'] = '中文';
		$data['ru'] = 'Pусский';
		$data['esp'] = 'Español';
		$data['hnt'] = 'भारतीय';

		// Arama modülü 
		$data['nerye_tur'] = 'Search city or tours';
		$data['nerye_otel'] = 'Search city or hotels';
		$data['bas_t'] = 'from';
		$data['bit_t'] = 'to';
		$data['ara'] = 'Search';

		// Datepicker
		$data['kpt'] = 'Close';
		$data['tmzl'] = 'Clean';
		$data['tmm'] = 'OK';
		$data['eksk'] = 'missing areas';
		$data['ocak'] = 'January';
		$data['subat'] = 'February';
		$data['mart'] = 'March';
		$data['nisan'] = 'April';
		$data['mayis'] = 'May';
		$data['hzrn'] = 'June';
		$data['temmuz'] = 'July';
		$data['agustos'] = 'August';
		$data['eylul'] = 'September';
		$data['ekim'] = 'October';
		$data['kasim'] = 'November';
		$data['arlk'] = 'December';
		$data['pazar'] = 'Sunday';
		$data['pazrts'] = 'Monday';
		$data['sali'] = 'Tuesday';
		$data['crsmb'] = 'Wednesday';
		$data['prsmb'] = 'Thursday';
		$data['cuma'] = 'Friday';
		$data['cmrts'] = 'Saturday';
		$data['pazar_kisa'] = 'Sun';
		$data['pazrts_kisa'] = 'Mon';
		$data['sali_kisa'] = 'Tue';
		$data['crsmb_kisa'] = 'Wed';
		$data['prsmb_kisa'] = 'Thu';
		$data['cuma_kisa'] = 'Fri';
		$data['cmrts_kisa'] = 'Sat';

		$data['gun_kisal'] = "['S', 'M', 'T', 'W', 'T', 'F', 'S']";

		// Önerilen kategoriler
		$data['onrln_ktgr_slgn'] 	= 'Unmissable Holiday stops';
		$data['onrln_otl_slgn'] 	= 'Unmissable Otels';
		$data['onrln_ktgr_btn'] 	= 'Explore More';
		$data['onrln_ktgr_yrm'] 	= 'Reviews';
		$data['onrln_ktgr_fiyt'] 	= 'From';	

		// E-Posta Kayit 
		$data['email_slgn1'] = 'We have great travel tips just for you ';
		$data['email_slgn2'] = 'Sign up for inspiring travel news.';
		$data['email_slgn_label'] = 'E-mail Address';
		$data['email_slgn_btn'] = 'Subscribe';
		$data['email_slgn_acklma'] = 'By signing up, you agree to receive promotional e-mail. You can cancel your subscription at any time. To learn more, read our privacy statement';

		// En popüler Yerler 
		$data['poplr_slgn'] = 'Most Popular Places';
		$data['poplr_slgn_btn'] = 'Show More';

		//En popüler Kategoriler
		$data['en_poplr_slgn'] 	= 'Most Popular Cities';
		$data['tur_otel'] 		= 'Tour and Hotel';
		$data['bluepoplr'] 		= 'Popular on BlueEye';
		$data['en_10'] 			= 'Most Popular 10 Cities';
		$data['gzlck_en_pplr'] 	= 'Popular places to visit';
		$data['assagi_yazi'] 	= 'Do you wonder what other events do we have in other cities?';
		$data['assagi_lnk'] 	= 'Select tours and events by Cities.';
		$data['assg_lnk_otel'] 	= 'Select Otels by Cities.';

		// Footer
		$data['dstk'] 			= 'Support';
		$data['srkt'] 			= 'Company';
		$data['bizimle_cls'] 	= 'Work With Us';
		$data['odeme'] 			= 'Ways You Can Pay';
		$data['iltsm'] 			= 'Contact';
		$data['yasl'] 			= 'Legal';
		$data['gizllk'] 		= 'Privacy Policy';
		$data['kul_ksl'] 		= 'Terms of Use';
		$data['hkkmzda'] 		= 'About Us';
		$data['kryr'] 			= 'Careers';
		$data['sts_szlsm'] 		= 'Distance Sales Contract ';
		$data['tdrk_yntm'] 		= 'Supplier Administration';
		$data['ortklk_yntm'] 	= 'Partner Administration';
		$data['cpryght'] 		= 'All rights reserved';

		// Ana kategori
		$data['ana_ktgr_slogan'] 	= 'Enter your dates to find available activities';
		$data['tum_tur'] 			= 'All Tours';
		$data['tum_otel'] 			= 'All Hotels ';
		$data['tknm_muhtml'] 		= 'Nearly sell out';
		$data['tum_tur_gor'] 		= 'See all the tours and activities';
		$data['tum_otl_gor'] 		= 'See all hotels';
		$data['nlr_sylnd'] 			= 'What people saying about';
		$data['en_gzl_yer'] 		= 'Top Attractions in ';
		$data['en_gzl_yerler'] 		= 'Top Attractions';
		$data['pplr_vrs_nkts'] 		= 'Popular Destinations';
		$data['x_turlari'] 			= 'Tours';
		$data['x_otel'] 			= 'Hotels';
		$data['grmk_istr'] 			= 'Want to discover all there is to do in ';
		$data['full_lste'] 			= 'Click here for a full list.';
		$data['en_pplr'] 			= 'Popular Tours and Attractions';


		// Alt kategori açiklama
		$data['acklma'] 		= 'Explanation';
		$data['icrdn_ipuc'] 	= 'Tips From Us';
		$data['yrrl_bilgi'] 	= 'Useful İnformation';
		$data['ne_zmn'] 		= 'When to visit?';
		$data['fiyat_ne'] 		= 'How much?';
		$data['rhbr_ihtyc'] 	= 'Do I need a Tour Guide';
		$data['nsl_gdlr'] 		= 'How to go?';
		$data['extra'] 			= 'Extra Tips';
		$data['adt_tru'] 		= 'See all tours';
		$data['adt_otl'] 		= 'See all hotels';

		// TUR
		$data['urn_kod'] 		= 'Code';
		$data['dh_fzl_rsm'] 	= 'More photos';
		$data['bslngc_fiyat'] 	= 'Per person starts from';
		$data['gnl_blg'] 		= 'General İnformations';
		$data['istk_lsts_ekl'] 	= 'Add to wishlist';
		$data['istk_lsts_tmm'] 	= 'Added to wishlist';
		$data['yr_ayr'] 		= 'Book Now';
		$data['sure'] 			= 'Duration';
		$data['hzl_grs'] 		= 'Skip the line';
		$data['kupon'] 			= 'Printed or mobile voucher accepted';
		$data['hzl_ony'] 		= 'İnstant confirmation';
		$data['engll'] 			= 'Wheelchair accessible';
		$data['cnli_rhbr'] 		= 'Live guide';
		$data['iptl_etm'] 		= 'Easy cancellation';
		$data['blsm_nkt'] 		= 'Meeting point';
		$data['fyt_blg']		= 'Price breakdown';
		$data['yer_ayr']		= 'Book Now';
		$data['otelleri']		= 'Hotels';
		

		$data['spt_ekle']		= 'Add to cart';
		$data['rezr_et']		= 'Reservation';
		$data['not_1']			= 'Note: When you make a pre-booking, the product falls on the ';
		$data['on_rzrv_ism']	= 'pre-reservation';
		$data['on_rzrv_lnk']	= '<a href="'.base_url().'prereservation">'.$data['on_rzrv_ism'].'</a> ';
		$data['on_rzrv']		= $data['on_rzrv_lnk'];
		$data['not_2']			= 'page. The product will be added to your cart when the availability is checked and confirmed. This process may take a few minutes. You have 1 hour to pay after you add it to your shopping cart.';
		$data['yrm_brk']		= 'Comment';
		$data['bslk_gr']		= 'Your Title';
		$data['msj_gir']		= 'Your Review';
		$data['nclm_ozt']		= 'Review summary';
		$data['sralama']		= 'Sort by';
		$data['dgrlndr']		= 'Rating';
		$data['otel_gun']		= 'Total Days';


		// Tarih ve kişi modülü alma modülü
		$data['ktlmc_scn_bslk'] 	= 'Select participants and date';
		$data['ltfn_scn'] 			= 'Please Select..';
		$data['ktlmc_scn'] 			= 'Select Participants';
		$data['ytskn']				= 'Adults';
		$data['yas']				= 'Age';
		$data['cck']				= 'Child';
		$data['bbk']				= 'Baby';
		// Deneyim/Açiklama modülü
		$data['dnym'] 				= 'Experience';
		$data['one_ckn'] 			= 'Highlights';
		$data['tam_acklm'] 			= 'Full Description';
		$data['rhbr'] 				= 'Travel Guide';
		$data['dahil'] 				= 'İncluded';
		$data['orya'] 				= 'When you get there';
		$data['blsm_nkt'] 			= 'Meeting point';
		$data['gtmdn_onc'] 			= 'Know before you go';
		$data['tur_blt'] 			= 'Tours and Tickets';
		$data['mustr_dgrlndrm'] 	= 'Customer Reviews';
		$data['gnl_dgrlndrm'] 		= 'General Rating';
		$data['n_dgrlndrm_gr'] 		= 'According to reviews';
		$data['inclm_ozt'] 			= 'Reviews Summary';
		$data['srvs'] 				= 'Service';
		$data['orgnzsn'] 			= 'Organization';
		$data['prnn_krsl'] 			= 'Value of the money';
		$data['gvnlk'] 				= 'Security';


		// Rezervasyon
		$data['rzrv_ust_bslk'] 	= 'My Reservations';
		$data['trh'] 			= 'Date';
		$data['saat'] 			= 'Time';
		$data['sure'] 			= 'Duration';
		$data['dety'] 			= 'Details';
		$data['n_ytskn'] 		= 'Adult';
		$data['n_cck'] 			= 'Child';
		$data['tutar'] 			= 'Amount';
		
		// Sepet
		$data['spt_ust_bslk'] 		= 'Cart';
		$data['e_git'] 				= 'Go to ';
		$data['urun'] 				= 'Product';
		$data['fiyat'] 				= 'Price';
		$data['spt_ktgr'] 			= 'Category';
		$data['ek_ucrt_yk']			= 'No additional charges';
		$data['ayrntlr'] 			= 'Details';
		$data['sil'] 				= 'Delete';
		$data['dznl'] 				= 'Edit';
		$data['zyrtc_bilg_dldr'] 	= 'FILL IN VISITOR INFORMATIONS';
		$data['sure_icnd_odeme'] 	= 'pay within time.';
		$data['uruun_sil_emin'] 	= 'Are you sure you want to delete this product?';
		$data['evet'] 				= 'Yes';
		$data['hayir'] 				= 'No';
		// Ziyaretçi Modal
		$data['ktlmc_ism_gir'] 	= 'Please enter the names of the participants';
		$data['n_kisi'] 		= 'Person';
		$data['lider'] 			= 'Lead person';
		$data['ism_sysm'] 		= 'Name and Surname';
		$data['ersknl_drm'] 	= 'Adulthood status';
		$data['erskn'] 			= 'Adulthood';
		$data['cck'] 			= 'Child';
		$data['email'] 			= 'Email address';
		$data['tlfn_no']		= 'Phone number';
		$data['geldgnz_shr'] 	= 'Your country';
		$data['iptal'] 			= 'Cancel';
		$data['kaydt'] 			= 'Save';
		$data['sprs_ozt'] 		= 'Order Summary';
		$data['odnck_ttr'] 		= 'Amount to be paid';
		$data['sprs_tm_btn'] 	= 'COMPLETE ORDERING';
		$data['alsvrs_dvm'] 	= 'Continue booking';

		// Ödeme Sayfasi
		$data['odme_bilgi'] 	= 'Payment method';
		$data['krt_no'] 		= 'Card Number';
		$data['krt_trh'] 		= 'Date of expire';
		$data['krt_cvc'] 		= 'CVC code';
		$data['tplm_fyt'] 		= 'Total Amount';
		$data['odme_tmm_btn'] 	= 'Proceed Payment';
		$data['onay_ilk'] 		= 'If you approve, you agree to the ';
		$data['onay_link'] 		= 'General Terms and Conditions.';
		$data['adres_bilgi'] 	= 'Please edit your address information to continue.';
		


		//Yan Modül
		$data['odme_scnk'] 			= 'Payment options we accepted';
		$data['gvnl_odme'] 			= 'Payments are secure and encrypted.';
		$data['krdi_vya_bank_krt'] 	= 'Credit card or Bank card';
		$data['veri_gvnlk'] 		= 'Data security';
		$data['bilgi_ssl'] 			= 'Your information is safe with us. All data is encrypted and transmitted securely with an SSL protocol.';
		$data['gzllk_ism'] 			= 'Privacy Statement';
		$data['gzllk_link'] 		= '<a href="'.base_url().'pages/detail/gizlilik-politikasi ">'.$data['gzllk_ism'].'</a>';
		$data['blue_gzllk_beyan'] 	= 'We do not sell your personal information to anyone. '.$data['gzllk_link'];
		$data['rezervsyn_gvnli'] 	= 'Book With Confidence';
		$data['en_iyi_fyt'] 		= 'Best price guarantee';
		$data['gonul_rhtl'] 		= '<b>Peace of mind</b>. Book ahead to skip the lines and reserve your spot.';

		// İletişim
		$data['iltsm_ust_bslk'] 	= 'Contact';
		$data['adres'] 				= 'Address';
		$data['bzml_iltsm'] 		= 'Contact us';
		$data['msjnz'] 				= 'Your Message';
		$data['gndr_btn'] 			= 'Send';

    	// Şifremi Unuttum
		$data['sfrm_untm_bslk'] 	= 'Forgot my password';
		$data['sfrm_untm_acklma'] 	= 'You can reset your password with the link that we have sent to your e-mail.';
		$data['uye_mail'] 			= 'My e-mail address';

		// Yardim
		$data['ytdms_bslk'] = 'Hello How Can We Help You?';

		// Geçmiş
		$data['gcms_bslk'] = 'History';

		// Şifre yenileme
		$data['sfre_bslk'] 		= 'Reset password';
		$data['sfre_acklm'] 	= 'You can reset your password by filling the blanks';
		$data['yni_sfr'] 		= 'Your new password';
		$data['yni_sfre_tkrr'] 	= 'Repeat your new password';

		// Search
		$data['aktvte_blnd'] 	= 'Activity found.';
		$data['arma_acklma'] 	= 'Enter your dates to find available activities';
		$data['arma_btn'] 		= 'Search';
		$data['arma_fltr'] 		= 'Filiters';
		$data['fyt_arlk'] 		= 'Price range';
		$data['yer_drumu'] 		= 'Check availability';

		// Modul başlıkları
		$data['blue_orjnl'] 	= 'BlueEye Original';
		$data['cok_stn'] 		= 'Bestseller';

		// Kullanici Ayarlari
		$data['ayrlr_bslk'] 			= 'Update Your Personal Information';
		$data['kllnc_adi'] 				= 'User name';
		$data['adresiniz'] 				= 'Your address';
		$data['ftura_adresi'] 			= 'Billing address';
		$data['ayrlr_tm_btn'] 			= 'Update my information';
		$data['uyligimi_dndr_blsk'] 	= 'Freeze Your Membership';
		$data['uyligimi_dndr_tm_btn'] 	= 'Freeze my Membership';

		// Giriş Sayfyasi
		$data['sfre'] 			= 'Password';
		$data['sfrmi_untm'] 	= 'Forgot my password';
		$data['kayt_ol_bslk'] 	= 'Register';
		$data['sfre_tkrr_gir'] 	= 'Repeat your password';
		$data['szlsm_ism'] 		= 'contract';
		$data['szlsm_link'] 	= '<a href="'.base_url().'pages/detail/kullanim-kosullari">'.$data['szlsm_ism'].'</a>';
		$data['szlsme_kbl'] 	= 'I agree with the '.$data['szlsm_link'].'.';

		// Wishlist
		$data['istek_bslk'] = 'Wishlist';
		$data['kldrs'] 		= 'Remove';

		// Javascript alerts
		$data['oncki_gun_secmzns'] = 'You can not select the previous date.';
		$data['onc_bas_t_sec'] = 'You must first select the strat date.';
		$data['ltfn_yolcu_scnz'] = 'Please select the number of passenger.';
		$data['a_18yaskck'] = 'İf you are less than 18 years old it is strictly forbidden to travel alone.';
		$data['ltfn_kisi_dgru'] = 'Please select the correct number of people.';
		$data['ism_bos_olmz'] = 'You can not leave your name blank.';
		$data['ism_kisa'] = 'Your name is too short.';
		$data['ism_uzun'] = 'Your name is too long.';
		$data['kllnc_bos_olmz'] = 'You can not leave user name blank.';
		$data['kllnc_ad_kisa'] = 'User name is too short.';
		$data['kllnc_ad_uzun'] = 'User name is too long.';
		$data['sfre_bs_olmz'] = 'You can not leave password blank.';
		$data['sfre_ck_kisa'] = 'Password is too short.';
		$data['sfre_ck_uzun'] = 'Password is too long.';
		$data['sfre_ayni_dagel'] = 'Passwords are not matched';
		$data['ltfn_emal_adrs_dgru'] = 'Please write the email address correctly.';
		$data['bslk_gir'] = 'Enter title';
		$data['brya_yazn'] = 'Write here';
		$data['yrm_ck_kisa'] = 'Review is too short.';
		$data['ltfn_zyrtc_dldr'] = 'Please fill in the visitor blanks.';


		// supplier form
		$data['sirkt_isim']			= 'Company name';
		$data['acente_unvan']		= 'Agency title';
		$data['tursab_no']			= 'TÜRSAB number';
		$data['yetksili_isim']		= 'Authorized name and surname';
		$data['sirket_adres']		= 'Address';
		$data['sirket_sehir']		= 'City';
		$data['sirket_posta']		= 'Post code';
		$data['sirket_tlfn']		= $data['tlfn_no'];
		$data['sirket_cep_tlfn']	= 'Mobile phone number';
		$data['sirket_web_site']	= 'Websites';




		return $data;


	}

}