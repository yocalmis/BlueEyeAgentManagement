<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ru {

	public function index()
	{
		$data['indirim']	= 'Сэкономьте';
		$data['bu_tura_n_kisi_bakiyor1']	= ' человек смотрят ';
		$data['bu_tura_n_kisi_bakiyor2']	= 'этот тур';
		$data['index']	= 'Домашняя страница';

		$data['pay_ok_title']	= 'Спасибо. Ваш заказ уже получен.';
		$data['pay_ok_rez_no']	= 'Номер бронирование';
		$data['pay_ok_lead']	= 'Лидер';
		$data['pay_ok_desc_1']	= 'Вы получите подтверждение по электронной почте после получения оплаты.';
		$data['pay_ok_desc_2']	= 'Вы имеете право на бесплатную отмену в соответствии с <b>политикой отмены туров</b>.';
		$data['pay_ok_desc_3']	= 'Вы можете просмотреть свои бронирования и внести изменения на странице <b>"Мои бронирования"</b>.';
		$data['pay_ok_print']	= 'Распечатайте мой заказ';		


		$data['sos_giris_son']	= 'и подтвердите, что вы прочитали нашу';
		$data['sos_giris_ilk']	= 'Продолжая, вы соглашаетесь с нашими';
		$data['onerilen_turlar']	= 'Рекомендуемые туры';
		$data['kupon_kodu_kontrol']	= 'Проверить';
		$data['kupon_kodu']	= 'Промо-код';
		$data['kupon_kodu_gir']	= 'Пожалуйста, введите промо-код';
		$data['kupon_kodu_var_mi']	= 'Есть промо код?';
		$data['otel_adi']			= 'Название отеля';
		$data['lider_kisi_ayni']	= 'Тот же лидер';
		// Login patch
		$data['login_with'] = 'Продолжить с..';
		$data['login_with_google']	= 'Продолжить с Google';
		$data['login_with_facebook']	= 'Продолжить с Facebook';
		$data['login_with_email']	= 'Продолжить с электронной почтой';
		$data['login_with_or']	= 'ИЛИ';
		$data['l_mail_title']	= "Присоединяйтесь - это бесплатно!";
		$data['l_mail_pass_desc']	= "Пароль должен быть не менее 6 и не более 18 символов.";
		// Language patch 
		$data['checkout_odeme_ek_bilgi']	= 'Дополнительная информация';

		//Rezervation cancellation patch
		$data['rez_iptal_durum_beklemede']	= 'Отмена в ожидании подтверждения.';
		$data['rez_iptal_durum_onaylandi']	= 'Отменен.';

		//Rezervation patch
		$data['rez_guncelle_btn']			= 'Обновить бронирование';
		$data['rez_guncelle_baslik']		= 'Обновить данные для бронирования';
		$data['rez_update_credit_card_btn']	= 'Обновить кредитную карту';
		$data['rez_cansel_rezerv_btn']		= 'Отменить бронирование';
		$data['rez_change_date_btn']		= 'Изменить дату бронирования';
		$data['rez_comment_btn']			= 'Оставить комментарий';
		$data['rez_print_btn']				= 'Печать';


		$data['rez_change_date_title']			= 'Изменить дату';
		$data['rez_change_date_reason_title']	= 'Почему вы хотите изменить дату бронирование?';
		$data['rez_change_date_placeholder']	= 'Напишите что-то';
		$data['rez_change_date_warning']		= 'Вы меняете дату бронирования, когда мы подтвердим процесс вы получите сообщения на почту.';
		$data['rez_change_date_next']			= 'Продолжить';


		$data['rez_update_card_title']			= 'Обновить кредитную карту';
		$data['rez_update_card_warning']		= 'Сейчас с вашей карты не перечисляются деньги. Деньги перечислются за 24 часа до начала тура. Вы можете отменить бронирование за 24 часа до начала тура.';

		$data['rez_cancel_reason']			= 'Почему вы хотите отменить бронирование?';
		$data['rez_cancel_warning']			= 'Вы отменяйте бронирование, когда мы подтвердим процесс вы получите сообщения на почту.';


		$data['rez_print_no']				= 'Номер бронирования';
		$data['rez_print_need_make_change']	= 'Хотите что-то изменить или исправить?';

		$data['rez_print_visit_booking']		= 'Перейдя на страницу бронирование вы можете изменить данные.';
		$data['rez_print_tour_specific']		= 'Информация тура';
		$data['rez_print_departure_title']		= 'Информация о выезде';
		$data['rez_print_departure_start_time']	= 'Время выезда';
		$data['rez_print_departure_end_time']	= 'Время возврата';
		$data['rez_print_departure_point']		= 'Место встречи';
		$data['rez_print_inc_and_exc_title']	= 'Из чего состоит поездка';
		$data['rez_print_cancel_policy_title']	= 'Политика отмены';
		$data['rez_print_cancel_policy_desc']	= 'Для возврата денег вы должны отменить бронирование за 24 часа до начала тура.';

		$data['card_code_not_correct']		= 'Неправильный промокод';
		$data['card_code_enter_correct']	= 'Пожалуйста напишите правильный промокод.';

		$data['window_error']			= 'Упс, что то пошло не так.';
		$data['rez_enter_correct_card']	= 'Пожалуйста напишите правильные данные..';
		$data['rez_cart_update_ok']		= 'Ваша карта успешно обновлена..';
		$data['rez_cancellation_ok']	= 'Успешно, вы получите письмо об отмене в течение 24 часов.';
		$data['rez_change_date_ok']		= 'Успешно, вы получите информационное письмо.';
		$data['rez_post_comment_ok']	= 'Успешно, вы можете посетить страницу тура.';

		// Özellikler Mıdülü
		$data['en_iyi_secim'] = 'Best Selection';
		$data['en_iyi_secim_aciklama'] = "Our strict screening process means that yor're only seeing the best quality tours, activities and attractions.";
		$data['en_iyi_fiyat'] = 'Best Price Garantee';
		$data['en_iyi_fiyat_aciklama'] = "Found a lower price elsewhere? We'll match it.";
		$data['guvenli_odeme'] = 'Secure Payments';
		$data['guvenli_odeme_aciklama'] = 'We use stripe to make your payments safe and secure.';
		$data['7_24_yardim'] = '24/7 Support';
		$data['7_24_yardim_aciklama'] = 'We are available to answer any questions or concerns via online chat, phone or email.';

		$data['lang'] = 'ru';
		$data['is_onay_true'] = 'Одобрено';
		$data['is_onay_false'] = 'Еще не Одобрено';
		$data['admin_aciklama'] = 'Описание админа';
		$data['tursab_img'] = 'tursab-en';
		$data['whatsapp_desc'] = 'Как мы можем вам помочь?';
		$data['ltfn_eksk_dldr'] = 'Пожалуйста, заполните все поля';
		// Menu linkleri
		$data['menu'] = 'Меню';
		$data['tur'] = 'Тур';
		$data['otel'] = 'Отель';
		$data['yrdm'] = 'Помощь';
		$data['spt'] = 'Корзина';
		$data['rzrvsyn'] = 'Бронирование';
		$data['ayr'] = 'Настройки';
		$data['istek'] = 'Список пожеланий';
		$data['gcms'] = 'История';
		$data['cks'] = 'Выход';
		$data['grs'] = 'Вход';
		$data['kayt'] = 'Регистрация';
		$data['tr'] = 'Türkçe';
		$data['eng'] = 'English'; 
		$data['cin'] = '中文';
		$data['ru'] = 'Pусский';
		$data['esp'] = 'Español';
		$data['hnt'] = 'भारतीय';

		// Arama modülü 
		$data['nerye_tur'] = 'Города или отели';
		$data['nerye_otel'] = 'Города или отели';
		$data['bas_t'] = 'Дата начала';
		$data['bit_t'] = 'Дата окончания';
		$data['ara'] = 'Поиск';

		// Datepicker
		$data['kpt'] = 'Закрыть';
		$data['tmzl'] = 'Очистить';
		$data['tmm'] = 'Ок';
		$data['eksk'] = 'missing areas';
		$data['ocak'] = 'Январь';
		$data['subat'] = 'Февраль';
		$data['mart'] = 'Март';
		$data['nisan'] = 'Апрель';
		$data['mayis'] = 'Май';
		$data['hzrn'] = 'Июнь';
		$data['temmuz'] = 'Июль';
		$data['agustos'] = 'Август';
		$data['eylul'] = 'Сентябрь';
		$data['ekim'] = 'Октябрь';
		$data['kasim'] = 'Ноябрь';
		$data['arlk'] = 'Декабрь';
		$data['pazar'] = 'Воскресенье';
		$data['pazrts'] = 'Понедельник';
		$data['sali'] = 'Вторник';
		$data['crsmb'] = 'Среда';
		$data['prsmb'] = 'Четверг';
		$data['cuma'] = 'Пятница';
		$data['cmrts'] = 'Суббота';
		$data['pazar_kisa'] = 'Вс.';
		$data['pazrts_kisa'] = 'Пн.';
		$data['sali_kisa'] = 'Вт.';
		$data['crsmb_kisa'] = 'Ср.';
		$data['prsmb_kisa'] = 'Чт.';
		$data['cuma_kisa'] = 'Пт.';
		$data['cmrts_kisa'] = 'Сб.';

		$data['gun_kisal'] = "['В', 'П', 'В', 'С', 'Ч', 'П', 'С']";

		// Önerilen kategoriler
		$data['onrln_ktgr_slgn'] 	= 'Лучшие туристические поездки';
		$data['onrln_otl_slgn'] 	= 'Лучшие Отели';
		$data['onrln_ktgr_btn'] 	= 'Узнайте больше';
		$data['onrln_ktgr_yrm'] 	= 'Комментарии';
		$data['onrln_ktgr_fiyt'] 	= 'Начальная цена';

		// E-Posta Kayit 
		$data['email_slgn1'] = 'У нас есть отличные советы ';
		$data['email_slgn2'] = 'Подпишитесь на вдохновляющие новости про путешествия.';
		$data['email_slgn_label'] = 'Адрес электронной почты';
		$data['email_slgn_btn'] = 'Подписка';
		$data['email_slgn_acklma'] = 'Регистрируясь, вы даёте согласие на получение рекламных электронных писем. Вы можете отменить свою подписку в любое время. Для получения дополнительной информации прочитайте наше заявление о конфиденциальности:';

		// En popüler Yerler 
		$data['poplr_slgn'] = 'Самые популярные места';
		$data['poplr_slgn_btn'] = 'Еще';

		//En popüler Kategoriler
		$data['en_poplr_slgn'] 	= 'Самые популярные города';
		$data['tur_otel'] 		= 'Тур и отель';
		$data['bluepoplr'] 		= 'Популярные в BlueEye';
		$data['en_10'] 			= '10 лучших городов';
		$data['gzlck_en_pplr'] 	= 'Популярные места для посещения';
		$data['assagi_yazi'] 	= 'Вам интересно, какие еще события у нас?';
		$data['assagi_lnk'] 	= 'Выберите туры и события по городу.';
		$data['assg_lnk_otel'] 	= 'Выберите отели и события по городу.';

		// Footer
		$data['dstk'] 			= 'Поддержка';
		$data['srkt'] 			= 'Компания';
		$data['bizimle_cls'] 	= 'Сотрудничество';
		$data['odeme'] 			= 'Варианты оплаты';
		$data['iltsm'] 			= 'Связаться с нами';
		$data['yasl'] 			= 'Юридическая информация';
		$data['gizllk'] 		= 'Политика конфиденциальности';
		$data['kul_ksl'] 		= 'Условия использования';
		$data['hkkmzda'] 		= 'О нас';
		$data['kryr'] 			= 'Карьера';
		$data['sts_szlsm'] 		= 'Договор о удаленной продаже';
		$data['tdrk_yntm'] 		= 'Поставщиками';
		$data['ortklk_yntm'] 	= 'Партнерством';
		$data['cpryght'] 		= 'Все права защищены';

		// Ana kategori
		$data['ana_ktgr_slogan'] 	= 'Введите желаемую дату для соответствующих мероприятиях';
		$data['tum_tur'] 			= 'Туры';
		$data['tum_otel'] 			= 'Отели';
		$data['tknm_muhtml'] 		= 'Быстро заканчивается';
		$data['tum_tur_gor'] 		= 'Посмотреть все туры и мероприятии';
		$data['tum_otl_gor'] 		= 'Посмотреть все отели';
		$data['nlr_sylnd'] 			= 'Что говорят другие?';
		$data['en_gzl_yer'] 		= ' популярные достопримечательности';
		$data['en_gzl_yerler'] 		= 'популярные достопримечательности';
		$data['pplr_vrs_nkts'] 		= 'Места для посещения';
		$data['x_turlari'] 			= 'туров';
		$data['x_otel'] 			= 'отелей';
		$data['grmk_istr'] 			= 'Хотите узнать больше? ';
		$data['full_lste'] 			= 'Нажмите для полного списка.';
		$data['en_pplr'] 			= 'Самые популярные места для посещения';


		// Alt kategori açiklama
		$data['acklma'] 		= 'Описание';
		$data['icrdn_ipuc'] 	= 'Инсайдерские советы';
		$data['yrrl_bilgi'] 	= 'Полезная информация';
		$data['ne_zmn'] 		= 'Когда посетить?';
		$data['fiyat_ne'] 		= 'Сколько это стоит?';
		$data['rhbr_ihtyc'] 	= 'Нужен ли мне гид';
		$data['nsl_gdlr'] 		= 'Как туда добраться?';
		$data['extra'] 			= 'Дополнительные советы';
		$data['adt_tru'] 		= 'Все туры';
		$data['adt_otl'] 		= 'Все отели';

		// TUR
		$data['urn_kod'] 		= 'Код продукта';
		$data['dh_fzl_rsm'] 	= 'Больше фотографий';
		$data['bslngc_fiyat'] 	= 'Цена за человека';
		$data['gnl_blg'] 		= 'Общая информация';
		$data['istk_lsts_ekl'] 	= 'Добавить в список желаний';
		$data['istk_lsts_tmm'] 	= 'Добавлено';
		$data['yr_ayr'] 		= 'Резерв';
		$data['sure'] 			= 'Продолжительность ';
		$data['hzl_grs'] 		= 'Быстрый вход';
		$data['kupon'] 			= 'Принимаются печатныe или мобильные купоны';
		$data['hzl_ony'] 		= 'Быстрое подтверждение';
		$data['engll'] 			= 'Доступно для инвалидов';
		$data['cnli_rhbr'] 		= 'Живой гид';
		$data['iptl_etm'] 		= 'Простая отмена';
		$data['blsm_nkt'] 		= 'Место встречи';
		$data['fyt_blg']		= 'Цены';
		$data['yer_ayr']		= 'Забронируйте Сейчас';
		$data['otelleri']		= 'Отели';


		$data['spt_ekle']		= 'Добавить в корзину';
		$data['rezr_et']		= 'Бронирование';
		$data['not_1']			= 'Примечание: При предварительном бронировании продукт попадает на ';
		$data['on_rzrv_ism']	= 'предварительное бронирование';
		$data['on_rzrv_lnk']	= '<a href="'.base_url().'prereservation">'.$data['on_rzrv_ism'].'</a> ';
		$data['on_rzrv']		= $data['on_rzrv_lnk'];
		$data['not_2']			= 'Продукт будет проверен и подтвержден. Этот процесс может занять несколько минут. У вас есть 1 час на оплату после добавления в корзину.';
		$data['yrm_brk']		= 'Комментарий';
		$data['bslk_gr']		= 'Ваш заголовок';
		$data['msj_gir']		= 'Ваш обзор';
		$data['nclm_ozt']		= 'Суммарный обзор';
		$data['sralama']		= 'Сортировать по';
		$data['dgrlndr']		= 'Рейтинг';
		$data['otel_gun']		= 'Всего дней';

		// Tarih ve kişi modülü alma modülü
		$data['ktlmc_scn_bslk'] 	= 'Выберите количество участников и дату';
		$data['ltfn_scn'] 			= 'Пожалуйста, выберите..';
		$data['ktlmc_scn'] 			= 'Выберите количество участников';
		$data['ytskn']				= 'Взрослый';
		$data['yas']				= 'Возраст';
		$data['cck']				= 'Дитя';
		$data['bbk']				= 'Ребенок';
		// Deneyim/Açiklama modülü
		$data['dnym'] 				= 'Опыт';
		$data['one_ckn'] 			= 'Особенности';
		$data['tam_acklm'] 			= 'Полное описание';
		$data['rhbr'] 				= 'Гид';
		$data['dahil'] 				= 'Содержание';
		$data['orya'] 				= 'Когда вы туда доберетесь';
		$data['blsm_nkt'] 			= 'Место встречи';
		$data['gtmdn_onc'] 			= 'Информация перед поездкой';
		$data['tur_blt'] 			= 'Туры и билеты';
		$data['mustr_dgrlndrm'] 	= 'Оценка клиентов';
		$data['gnl_dgrlndrm'] 		= 'Общая оценка';
		$data['n_dgrlndrm_gr'] 		= 'По отзывам';
		$data['inclm_ozt'] 			= 'Суммарный обзор';
		$data['srvs'] 				= 'Услуги';
		$data['orgnzsn'] 			= 'Организация';
		$data['prnn_krsl'] 			= 'Соотношение цена / качество';
		$data['gvnlk'] 				= 'Безопасность';


		// Rezervasyon
		$data['rzrv_ust_bslk'] 	= 'Бронирования';
		$data['trh'] 			= 'Дата';
		$data['saat'] 			= 'Время';
		$data['sure'] 			= 'Продолжительность';
		$data['dety'] 			= 'Детали';
		$data['n_ytskn'] 		= 'взрослых';
		$data['n_cck'] 			= 'детей';
		$data['n_bbk'] 			= 'младенцев';
		$data['tutar'] 			= 'Общая сумма';

		// Sepet
		$data['spt_ust_bslk'] 		= 'Корзина';
		$data['e_git'] 				= ' ';
		$data['urun'] 				= 'Продукт';
		$data['fiyat'] 				= 'Цена';
		$data['spt_ktgr'] 			= 'Категория';
		$data['ek_ucrt_yk']			= 'Без дополнительных оплат';
		$data['ayrntlr'] 			= 'Подробности';
		$data['sil'] 				= 'Удалить';
		$data['dznl'] 				= 'Изменить';
		$data['zyrtc_bilg_dldr'] 	= 'Заполните информацию для посетителей';
		$data['sure_icnd_odeme'] 	= 'оплатите в течения этого времени.';
		$data['uruun_sil_emin'] 	= 'Вы уверены, что хотите удалить этот продукт?';
		$data['evet'] 				= 'Да';
		$data['hayir'] 				= 'Нет';
		// Ziyaretçi Modal
		$data['ktlmc_ism_gir'] 	= 'Пожалуйста, введите имена участников';
		$data['n_kisi'] 		= 'человек';
		$data['lider'] 			= 'Лидер отряда';
		$data['ism_sysm'] 		= 'Имя';
		$data['ersknl_drm'] 	= 'Взрослый статус';
		$data['erskn'] 			= 'Взрослый';
		$data['cck'] 			= 'Ребёнок';
		$data['email'] 			= 'Адрес электронной почты';
		$data['tlfn_no']		= 'Номер телефона';
		$data['geldgnz_shr'] 	= 'Ваш Город';
		$data['iptal'] 			= 'Отмена';
		$data['kaydt'] 			= 'Сохранить';
		$data['sprs_ozt'] 		= 'Сумма заказа';
		$data['odnck_ttr'] 		= 'Необходимая к оплате сумма';
		$data['sprs_tm_btn'] 	= 'Завершить заказ';
		$data['alsvrs_dvm'] 	= 'Вернуться к покупкам';

		// Ödeme Sayfasi
		$data['odme_bilgi'] 	= 'Способ оплаты';
		$data['krt_no'] 		= 'Номер карты';
		$data['krt_trh'] 		= 'Дата';
		$data['krt_cvc'] 		= 'CVC';
		$data['tplm_fyt'] 		= 'Сумма заказа';
		$data['odme_tmm_btn'] 	= 'Завершить оплату';
		$data['onay_ilk'] 		= 'Соглашаюсь с ';
		$data['onay_link'] 		= 'Общими положениями и условиями.';
		$data['adres_bilgi'] 	= 'Пожалуйста, измените информацию об адресе, чтобы продолжить.';



		//Yan Modül
		$data['odme_scnk'] 			= 'Варианты оплаты которые мы принимаем';
		$data['gvnl_odme'] 			= 'Ваши платежи в безопасности и зашифрованы.';
		$data['krdi_vya_bank_krt'] 	= 'Кредитная или дебетовая карта';
		$data['veri_gvnlk'] 		= 'Безопасность данных';
		$data['bilgi_ssl'] 			= 'Ваша информация находится в полной безопасности. Все данные надежно зашифрованы и передаются по протоколу SSL.';
		$data['gzllk_ism'] 			= 'Заявление о конфиденциальности';
		$data['gzllk_link'] 		= '<a href="'.base_url().'pages/detail/gizlilik-politikasi ">'.$data['gzllk_ism'].'</a>';
		$data['blue_gzllk_beyan'] 	= 'Blue Eye Tour сохранит вашу конфиденциальность. Не передает вашу личную информацию никому. '.$data['gzllk_link'];
		$data['rezervsyn_gvnli'] 	= 'Бронируйте безопасно';
		$data['en_iyi_fyt'] 		= 'Гарантия лучшей цены (Вы не довольны выбранным туром? Мы возместим вам разницу)';
		$data['gonul_rhtl'] 		= '<b>Не беспокойиесь</b>. Без очереди и ожидания забронируйте себе место.';

		// İletişim
		$data['iltsm_ust_bslk'] 	= 'Связь';
		$data['adres'] 				= 'Адрес';
		$data['bzml_iltsm'] 		= 'Свяжитесь с нами';
		$data['msjnz'] 				= 'Ваше сообщение';
		$data['gndr_btn'] 			= 'Отправить';

    	// Şifremi Unuttum
		$data['sfrm_untm_bslk'] 	= 'Забыли пароль';
		$data['sfrm_untm_acklma'] 	= 'Вы можете обновить свой пароль, нажав на ссылку сброса, которую мы отправили на ваш электронный адрес.';
		$data['uye_mail'] 			= 'Адрес электронной почты';

		// Yardim
		$data['ytdms_bslk'] = 'Здравствуйте, как мы можем вам помочь?';

		// Geçmiş
		$data['gcms_bslk'] = 'История';

		// Şifre yenileme
		$data['sfre_bslk'] 		= 'Обновление пароля';
		$data['sfre_acklm'] 	= 'Вы можете обновить свой новый пароль, введя его ниже.';
		$data['yni_sfr'] 		= 'Новый пароль';
		$data['yni_sfre_tkrr'] 	= 'Повторите новый пароль';

		// Search
		$data['aktvte_blnd'] 	= ' найденных мероприятий.';
		$data['arma_acklma'] 	= 'Введите желаемую дату мероприятия';
		$data['arma_btn'] 		= 'Поиск';
		$data['arma_fltr'] 		= 'Фильтры';
		$data['fyt_arlk'] 		= 'Диапазон цен';
		$data['yer_drumu'] 		= 'Проверить наличие';

		// Modul başlıkları
		$data['blue_orjnl'] 	= 'BlueEye оригинал';
		$data['cok_stn'] 		= 'Бестселлер';

		// Kullanici Ayarlari
		$data['ayrlr_bslk'] 			= 'Обновите вашу личную информацию';
		$data['kllnc_adi'] 				= 'Имя пользователя';
		$data['adresiniz'] 				= 'Ваш Адрес';
		$data['ftura_adresi'] 			= 'Платежный адрес';
		$data['ayrlr_tm_btn'] 			= 'Обновить мою информацию';
		$data['uyligimi_dndr_blsk'] 	= 'Остановить регистрацию';
		$data['uyligimi_dndr_tm_btn'] 	= 'Остановить свою регистрацию';

		// Giriş Sayfyasi
		$data['sfre'] 			= 'Пароль';
		$data['sfrmi_untm'] 	= 'Забыли пароль';
		$data['kayt_ol_bslk'] 	= 'Регистрация';
		$data['sfre_tkrr_gir'] 	= 'Повторите пароль';
		$data['szlsm_ism'] 		= 'контрактом';
		$data['szlsm_link'] 	= '<a href="'.base_url().'pages/detail/kullanim-kosullari">'.$data['szlsm_ism'].'</a>';
		$data['szlsme_kbl'] 	= 'Я согласен с '.$data['szlsm_link'].'.';

		// Wishlist
		$data['istek_bslk'] = 'Список пожеланий';
		$data['kldrs'] 		= 'Удалить';

		// Javascript alerts
		$data['oncki_gun_secmzns'] = 'Вы не можете выбрать предыдущий день.';
		$data['onc_bas_t_sec'] = 'Вы должны сначала выбрать дату начало.';
		$data['ltfn_yolcu_scnz'] = 'Пожалуйста, выберите количество пассажиров.';
		$data['a_18yaskck'] = 'Если вам не исполнилось 18 лет, вам запрещено путешествовать самостоятельно.';
		$data['ltfn_kisi_dgru'] = 'Пожалуйста, выберите правильное количество людей.';
		$data['ism_bos_olmz'] = 'Вы не можете оставить свое имя пустым.';
		$data['ism_kisa'] = 'Ваше имя слишком короткое.';
		$data['ism_uzun'] = 'Ваше имя слишком длинное.';
		$data['kllnc_bos_olmz'] = 'Вы не можете оставить имя пользователя пустым.';
		$data['kllnc_ad_kisa'] = 'Имя пользователя слишком короткое.';
		$data['kllnc_ad_uzun'] = 'Имя пользователя слишком длинное.';
		$data['sfre_bs_olmz'] = 'Вы не можете оставить пароль пустым.';
		$data['sfre_ck_kisa'] = 'Пароль слишком короткий.';
		$data['sfre_ck_uzun'] = 'Пароль слишком длинный.';
		$data['sfre_ayni_dagel'] = 'Пароли не совпадают';
		$data['ltfn_emal_adrs_dgru'] = 'Пожалуйста, напишите адрес электронной почты правильно.';
		$data['bslk_gir'] = 'Тема';
		$data['brya_yazn'] = 'Пишите здесь';
		$data['yrm_ck_kisa'] = 'Отзыв слишком короткий.';
		$data['ltfn_zyrtc_dldr'] = 'Пожалуйста, заполните поля для посетителей.';


		// supplier form
		$data['sirkt_isim']			= 'Название компании';
		$data['acente_unvan']		= 'Название агентства';
		$data['tursab_no']			= 'TÜRSAB номер';
		$data['yetksili_isim']		= 'Авторизованное имя и фамилия';
		$data['sirket_adres']		= 'Адрес';
		$data['sirket_sehir']		= 'Город';
		$data['sirket_posta']		= 'Почтовый индекс';
		$data['sirket_tlfn']		= $data['tlfn_no'];
		$data['sirket_cep_tlfn']	= 'Номер мобильного телефона';
		$data['sirket_web_site']	= 'Веб-сайты';
		$data['check_ack']			= 'Ваш заказ будет активирован через агентство после оплаты по почте.';

		return $data;


	}

}