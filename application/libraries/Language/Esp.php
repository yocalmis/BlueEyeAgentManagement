<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Esp {

	public function index()
	{
		$data['indirim']	= 'Ahorre';
		$data['bu_tura_n_kisi_bakiyor1']	= 'personas están  ';
		$data['bu_tura_n_kisi_bakiyor2']	= 'mirando este recorrido';
		$data['index']	= 'Página de inicio';

		$data['pay_ok_title']	= 'Gracias Su reserva ha sido recibida.';
		$data['pay_ok_rez_no']	= 'Su número de reserva';
		$data['pay_ok_lead']	= 'líder';
		$data['pay_ok_desc_1']	= 'Recibirá un correo electrónico de confirmación después de que se haya recibido su pago.';
		$data['pay_ok_desc_2']	= 'Tiene derecho a la cancelación gratuita de acuerdo con <b>la política de cancelación de los tours</b>.';
		$data['pay_ok_desc_3']	= 'Puede ver sus reservas y realizar cambios en la página <b>"Mis reservas"</b>.';
		$data['pay_ok_print']	= 'Imprimir mi reserva';


		$data['sos_giris_son']	= 'Y confirma que has leído nuestro';
		$data['sos_giris_ilk']	= 'Al proceder, usted acepta nuestro';
		$data['onerilen_turlar']	= 'Tours recomendados';
		$data['kupon_kodu_kontrol']	= 'Cheque';
		$data['kupon_kodu']	= 'Código de cupón';
		$data['kupon_kodu_gir']	= 'Por favor ingrese el código de promoción';
		$data['kupon_kodu_var_mi']	= '¿Tienes un código de promoción?';
		$data['otel_adi']	= 'Nombre del hotel';
		$data['lider_kisi_ayni']	= 'Mismo persona lider';
		// Login patch
		$data['login_with'] = 'Continua con..';
		$data['login_with_google']	= 'Continuar con Google';
		$data['login_with_facebook']	= 'Continuar con Facebook';
		$data['login_with_email']	= 'Continuar con correo electrónico';
		$data['login_with_or']	= 'O';
		$data['l_mail_title']	= "¡Únete ahora, es gratis!";
		$data['l_mail_pass_desc']	= "La contraseña debe tener un mínimo de 6 y un máximo de 18 caracteres.";
		// Language patch 
		$data['checkout_odeme_ek_bilgi']	= 'Información adicional';
		
		//Rezervation cancellation patch
		$data['rez_iptal_durum_beklemede']	= 'Cancelación esperando confirmación.';
		$data['rez_iptal_durum_onaylandi']	= 'Cancelado.';

		//Rezervation patch
		$data['rez_guncelle_btn']			= 'Actualizar reserva.';
		$data['rez_guncelle_baslik']		= 'Actualizar detalles de la reserva';
		$data['rez_update_credit_card_btn']	= 'Actualizar mi tarjeta de crédito';
		$data['rez_cansel_rezerv_btn']		= 'Cancelar la reserva';
		$data['rez_change_date_btn']		= 'Cambiar fecha de reserva';
		$data['rez_comment_btn']			= 'Comenta sobre este tour';
		$data['rez_print_btn']				= 'Imprime la reserva.';

		
		$data['rez_change_date_title']			= 'Cambiar fecha del tour.';
		$data['rez_change_date_reason_title']	= '¿Cuál es el motivo para cambiar la fecha de reserva?';
		$data['rez_change_date_placeholder']	= 'Escribe algo.';
		$data['rez_change_date_warning']		= 'Está a punto de cambiar su fecha de reserva, recibirá un correo electrónico después de que se confirme su transacción.';
		$data['rez_change_date_next']			= 'Seguir.';


		$data['rez_update_card_title']			= 'Actualiza tu tarjeta de crédito.';
		$data['rez_update_card_warning']		= 'Su tarjeta de crédito no será cargada en este momento. Su pago será cobrado dentro de las 24 horas de la hora de inicio del tour. Tiene derecho a cancelación hasta 24 horas antes del comienzo del recorrido.';

		$data['rez_cancel_reason']			= '¿Cuál es el motivo para cancelar su reserva?';
		$data['rez_cancel_warning']			= 'Está a punto de cancelar su reserva, recibirá un correo electrónico después de que confirmemos su transacción.';


		$data['rez_print_no']				= 'Número de reserva.';
		$data['rez_print_need_make_change']	= '¿Quieres hacer o cancelar cambios?';

		$data['rez_print_visit_booking']		= 'Puede hacer sus cambios visitando la página de reserva.';
		$data['rez_print_tour_specific']		= 'Sobre el recorrido.';
		$data['rez_print_departure_title']		= 'Información de salida.';
		$data['rez_print_departure_start_time']	= 'Hora de salida.';
		$data['rez_print_departure_end_time']	= 'Hora de regreso.';
		$data['rez_print_departure_point']		= 'Punto de encuentro.';
		$data['rez_print_inc_and_exc_title']	= 'Incluyendo && excluyendo.';
		$data['rez_print_cancel_policy_title']	= 'Política de cancelación.';
		$data['rez_print_cancel_policy_desc']	= 'Para obtener un reembolso, debe cancelar su recorrido 24 horas antes del inicio del recorrido, de lo contrario, no se le reembolsará.';

		$data['card_code_not_correct']		= 'Código de cupón incorrecto.';
		$data['card_code_enter_correct']	= 'Por favor, introduzca el código de cupón correcto.';

		$data['window_error']			= 'Algo salió mal.';
		$data['rez_enter_correct_card']	= 'Por favor ingrese la información correcta de la tarjeta.';
		$data['rez_cart_update_ok']		= 'Su tarjeta ha sido actualizada con éxito.';
		$data['rez_cancellation_ok']	= 'Exitoso, recibirá un correo de cancelación dentro de las 24 horas.';
		$data['rez_change_date_ok']		= 'Exitoso, recibirá un correo informativo.';
		$data['rez_post_comment_ok']	= 'Exitoso, puedes visitar la página del tour.';

		// Özellikler Mıdülü
		$data['en_iyi_secim'] = 'Best Selection';
		$data['en_iyi_secim_aciklama'] = "Our strict screening process means that yor're only seeing the best quality tours, activities and attractions.";
		$data['en_iyi_fiyat'] = 'Best Price Garantee';
		$data['en_iyi_fiyat_aciklama'] = "Found a lower price elsewhere? We'll match it.";
		$data['guvenli_odeme'] = 'Secure Payments';
		$data['guvenli_odeme_aciklama'] = 'We use stripe to make your payments safe and secure.';
		$data['7_24_yardim'] = '24/7 Support';
		$data['7_24_yardim_aciklama'] = 'We are available to answer any questions or concerns via online chat, phone or email.';
		
		$data['lang'] = 'esp';
		$data['is_onay_true'] = 'Aprobado';
		$data['is_onay_false'] = 'No aprobado';
		$data['tursab_img'] = 'tursab-en';
		$data['admin_aciklama'] = 'Descripción del administrador';
		$data['whatsapp_desc'] = 'Cómo te podemos ayudar?';
		$data['ltfn_eksk_dldr'] = 'Por favor rellena todos los campos'; 
		// Menu linkleri
		$data['menu'] = 'Menú';
		$data['tur'] = 'Tour';
		$data['otel'] = 'Hotel';
		$data['yrdm'] = 'Ayuda';
		$data['spt'] = 'Carrito de compras';
		$data['rzrvsyn'] = 'Reservas';
		$data['ayr'] = 'Ajustes';
		$data['istek'] = 'Lista de deseos';
		$data['gcms'] = 'Historial';
		$data['cks'] = 'Salida';
		$data['grs'] = 'Entrada';
		$data['kayt'] = 'Registrarse';
		$data['tr'] = 'Türkçe';
		$data['eng'] = 'English';
		$data['cin'] = '中文';
		$data['ru'] = 'Pусский';
		$data['esp'] = 'Español';
		$data['hnt'] = 'भारतीय';

		// Arama modülü 
		$data['nerye_tur'] = 'Buscar ciudad o tours';
		$data['nerye_otel'] = 'Buscar ciudad u hoteles';
		$data['bas_t'] = 'desde';
		$data['bit_t'] = 'a';
		$data['ara'] = 'Buscar';

		// Datepicker
		$data['kpt'] = 'Cerrar';
		$data['tmzl'] = 'Borrar';
		$data['tmm'] = 'Aceptar';
		$data['eksk'] = 'áreas faltantes';
		$data['ocak'] = 'enero';
		$data['subat'] = 'Febrero';
		$data['mart'] = 'Marzo';
		$data['nisan'] = 'Abril';
		$data['mayis'] = 'Mayo';
		$data['hzrn'] = 'June';
		$data['temmuz'] = 'Julio';
		$data['agustos'] = 'Agosto';
		$data['eylul'] = 'Septiembre';
		$data['ekim'] = 'Octubre';
		$data['kasim'] = 'Noviembre';
		$data['arlk'] = 'Diciembre';
		$data['pazar'] = 'Domigo';
		$data['pazrts'] = 'Lunes';
		$data['sali'] = 'Martes';
		$data['crsmb'] = 'Miércoles';
		$data['prsmb'] = 'Jueves';
		$data['cuma'] = 'Viernes';
		$data['cmrts'] = 'Sábado';
		$data['pazar_kisa'] = 'dom'; 
		$data['pazrts_kisa'] = 'lun'; 
		$data['sali_kisa'] = 'mar'; 
		$data['crsmb_kisa'] = 'mie'; 
		$data['prsmb_kisa'] = 'jue'; 
		$data['cuma_kisa'] = 'vie'; 
		$data['cmrts_kisa'] = 'sab'; 

		$data['gun_kisal'] = "['D', 'L', 'M', 'M', 'J', 'V', 'S']";

		// Önerilen kategoriler
		$data['onrln_ktgr_slgn'] 	= 'Destinos para vacaciones imperdibles';
		$data['onrln_otl_slgn'] 	= 'Explora más';
		$data['onrln_ktgr_btn'] 	= 'Comentarios';
		$data['onrln_ktgr_yrm'] 	= 'Comment'; // 
		$data['onrln_ktgr_fiyt'] 	= 'Precios';	

		// E-Posta Kayit 
		$data['email_slgn1'] = 'Tenemos buenos consejos de viaje para usted ';
		$data['email_slgn2'] = 'Regístrese para resivir semanalmente inspiración para tener unas vacaciones de enseuño:';
		$data['email_slgn_label'] = 'Su dirección de correo electrónico';
		$data['email_slgn_btn'] = 'Registrar';
		$data['email_slgn_acklma'] = 'Al registrarte, aceptas recibir correos electrónicos promocionales. Puedes cancelar tu suscripción en cualquier momento. Para más información, lea nuestra declaración de privacidad';

		// En popüler Yerler 
		$data['poplr_slgn'] = 'Los destinos más populares:';
		$data['poplr_slgn_btn'] = 'Mostrar más';

		//En popüler Kategoriler
		$data['en_poplr_slgn'] 	= 'Categorías más populares';
		$data['tur_otel'] 		= 'Tour y hotel';
		$data['bluepoplr'] 		= 'Popular en BlueEye';
		$data['en_10'] 			= 'Categoría Top 10';
		$data['gzlck_en_pplr'] 	= 'Popular places to visit';
		$data['assagi_yazi'] 	= 'Do you wonder what other events do we have in other cities?';
		$data['assagi_lnk'] 	= 'Select tours and events by Cities.';
		$data['assg_lnk_otel'] 	= 'Select Otels by Cities.';

		// Footer
		$data['dstk'] 			= 'Soporte';
		$data['srkt'] 			= 'Empresa';
		$data['bizimle_cls'] 	= 'Trabaja con nosotros';
		$data['odeme'] 			= 'Opciones de pago';
		$data['iltsm'] 			= 'Comunicación';
		$data['yasl'] 			= 'Legal';
		$data['gizllk'] 		= 'Política de privacidad';
		$data['kul_ksl'] 		= 'Términos de uso';
		$data['hkkmzda'] 		= 'Sobre Nosotros';
		$data['kryr'] 			= 'Trayectoria';
		$data['sts_szlsm'] 		= 'Contrato de venta a distancia ';
		$data['tdrk_yntm'] 		= 'Gestión de proveedores';
		$data['ortklk_yntm'] 	= 'Gestión de la asociación';
		$data['cpryght'] 		= 'Todos los derechos reservados';

		// Ana kategori
		$data['ana_ktgr_slogan'] 	= 'Ingrese las fechas en que desea encontrar los tours apropiados';
		$data['tum_tur'] 			= 'Todos los tours';
		$data['tum_otel'] 			= 'Todos los hoteles ';
		$data['tknm_muhtml'] 		= 'Agotamiento rápido';
		$data['tum_tur_gor'] 		= 'Ver todos los tours y actividades';
		$data['tum_otl_gor'] 		= '¿Qué se ha dicho sobre?';
		$data['nlr_sylnd'] 			= 'Tenemos buenos consejos de viaje para usted:';
		$data['en_gzl_yer'] 		= 'Atracciones principales en '; 
		$data['en_gzl_yerler'] 		= 'Atracciones principales'; 
		$data['pplr_vrs_nkts'] 		= 'Destinos populares'; 
		$data['x_turlari'] 			= 'Excursiones'; 
		$data['x_otel'] 			= 'Hoteles'; 
		$data['grmk_istr'] 			= '¿Quieres descubrir todo lo que hay que hacer en '; 
		$data['full_lste'] 			= 'Clic aquí para una lista completa.'; 
		$data['en_pplr'] 			= 'Lugares más populares para visitar';


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
		$data['urn_kod'] 		= 'Código del producto';
		$data['dh_fzl_rsm'] 	= 'Ver más fotos';
		$data['bslngc_fiyat'] 	= 'Precio por persona';
		$data['gnl_blg'] 		= 'Información general';
		$data['istk_lsts_ekl'] 	= 'Añadir a la lista de deseos:';
		$data['istk_lsts_tmm'] 	= 'Añadido a la lista de deseos'; 
		$data['yr_ayr'] 		= 'Reserva';
		$data['sure'] 			= 'Duración en horas';
		$data['hzl_grs'] 		= 'Inicio de sesión rápido';
		$data['kupon'] 			= 'Cupones impresos o móviles aceptados';
		$data['hzl_ony'] 		= 'Confirmación rápida';
		$data['engll'] 			= 'Discapacitado';
		$data['cnli_rhbr'] 		= 'Guía en vivo';
		$data['iptl_etm'] 		= 'Easy cancellation';
		$data['blsm_nkt'] 		= 'Meeting point';
		$data['fyt_blg']		= 'Fácil cancelación';
		$data['yer_ayr']		= 'Punto de encuentro:';
		$data['otelleri']		= 'Hoteles'; 
		

		$data['spt_ekle']		= 'Añadir a la cesta';
		$data['rezr_et']		= 'Reserva';
		$data['not_1']			= 'Nota: cuando realiza una pre-reserva, el producto cae en la ';
		$data['on_rzrv_ism']	= 'pre reserva';
		$data['on_rzrv_lnk']	= '<a href="'.base_url().'prereservation">'.$data['on_rzrv_ism'].'</a> ';
		$data['on_rzrv']		= $data['on_rzrv_lnk'];
		$data['not_2']			= 'página. El producto se agregará a su carrito cuando se verifique y confirme la disponibilidad. Este proceso puede tardar unos minutos. Tienes 1 hora para pagar después de agregarla a tu carrito de compras.';
		$data['yrm_brk']		= 'Comentario';
		$data['bslk_gr']		= 'Tu título';
		$data['msj_gir']		= 'Tu reseña';
		$data['nclm_ozt']		= 'Resumen de la reseña';
		$data['sralama']		= 'Ordenar por';
		$data['dgrlndr']		= 'Clasificación';
		$data['otel_gun']		= 'Días totales';


		// Tarih ve kişi modülü alma modülü
		$data['ktlmc_scn_bslk'] 	= 'Seleccione el número de participantes y la fecha';
		$data['ltfn_scn'] 			= 'Seleccione ...';
		$data['ktlmc_scn'] 			= 'Seleccionar Participantes';
		$data['ytskn']				= 'Adultos';
		$data['yas']				= 'Edad';
		$data['cck']				= 'Los niños';
		$data['bbk']				= 'Experiencia';
		// Deneyim/Açiklama modülü
		$data['dnym'] 				= 'Experiencia';
		$data['one_ckn'] 			= 'Destacados';
		$data['tam_acklm'] 			= 'Descripción completa';
		$data['rhbr'] 				= 'Guía de viaje';
		$data['dahil'] 				= 'Incluido';
		$data['orya'] 				= 'Cuando llegues allí';
		$data['blsm_nkt'] 			= 'Punto de encuentro';
		$data['gtmdn_onc'] 			= 'Que saber antes de ir';
		$data['tur_blt'] 			= 'Tours y entradas';
		$data['mustr_dgrlndrm'] 	= 'Evaluación del cliente';
		$data['gnl_dgrlndrm'] 		= 'Calificación general';
		$data['n_dgrlndrm_gr'] 		= 'Según la evaluación';
		$data['inclm_ozt'] 			= 'Resumen de la revisión';
		$data['srvs'] 				= 'Servicio';
		$data['orgnzsn'] 			= 'Organización';
		$data['prnn_krsl'] 			= 'Dinero';
		$data['gvnlk'] 				= 'Seguridad';


		// Rezervasyon
		$data['rzrv_ust_bslk'] 	= 'Mi libro';
		$data['trh'] 			= 'Historial';
		$data['saat'] 			= 'Tiempo';
		$data['sure'] 			= 'Duración';
		$data['dety'] 			= 'Detalle';
		$data['n_ytskn'] 		= 'el adulto';
		$data['n_cck'] 			= 'niños';
		$data['tutar'] 			= 'Cantidad';
		
		// Sepet
		$data['spt_ust_bslk'] 		= 'Carrito de compras';
		$data['e_git'] 				= 'Producto ';
		$data['urun'] 				= 'Product';
		$data['fiyat'] 				= 'Precio';
		$data['spt_ktgr'] 			= 'Categoría';
		$data['ek_ucrt_yk']			= 'Sin cargos adicionales:';
		$data['ayrntlr'] 			= 'Detalles';
		$data['sil'] 				= 'Eliminar';
		$data['dznl'] 				= 'Editar'; 
		$data['zyrtc_bilg_dldr'] 	= 'Completa las informaciones de los visitantes.';
		$data['sure_icnd_odeme'] 	= 'pagar dentro de tiempo';
		$data['uruun_sil_emin'] 	= '¿Estás seguro de que quieres eliminar este producto?';
		$data['evet'] 				= 'Sí';
		$data['hayir'] 				= 'No';
		// Ziyaretçi Modal
		$data['ktlmc_ism_gir'] 	= 'Por favor ingrese los nombres de los participantes';
		$data['n_kisi'] 		= 'Persona';
		$data['lider'] 			= 'Persona principal';
		$data['ism_sysm'] 		= 'Nombre y apellido';
		$data['ersknl_drm'] 	= 'Estado de la edad adulta';
		$data['erskn'] 			= 'Edad adulta';
		$data['cck'] 			= 'Niña';
		$data['email'] 			= 'Dirección de correo electrónico';
		$data['tlfn_no']		= 'Número de teléfono';
		$data['geldgnz_shr'] 	= 'Tu ciudad';
		$data['iptal'] 			= 'Cancelar';
		$data['kaydt'] 			= 'Salvar';
		$data['sprs_ozt'] 		= 'Resumen del pedido';
		$data['odnck_ttr'] 		= 'Cantidad a pagar';
		$data['sprs_tm_btn'] 	= 'Completar orden';
		$data['alsvrs_dvm'] 	= 'Continuar comprando';

		// Ödeme Sayfasi
		$data['odme_bilgi'] 	= 'Método de pago';
		$data['krt_no'] 		= 'Número de tarjeta';
		$data['krt_trh'] 		= 'Fecha de expiracion';
		$data['krt_cvc'] 		= 'Código CVC';
		$data['tplm_fyt'] 		= 'Cantidad total';
		$data['odme_tmm_btn'] 	= 'Proceder el pago';
		$data['onay_ilk'] 		= 'Si usted aprueba, usted acepta la ';
		$data['onay_link'] 		= 'Términos Generales y Condiciones.';
		$data['adres_bilgi'] 	= 'Por favor, edite la información de su dirección para continuar.';
		


		//Yan Modül
		$data['odme_scnk'] 			= 'Opciones de pago que aceptamos';
		$data['gvnl_odme'] 			= 'Los pagos son seguros y encriptados.';
		$data['krdi_vya_bank_krt'] 	= 'Tarjeta de crédito o tarjeta bancaria';
		$data['veri_gvnlk'] 		= 'Seguridad de datos';
		$data['bilgi_ssl'] 			= 'Su información está segura con nosotros. Todos los datos están encriptados y transmitidos de forma segura con un protocolo SSL.';
		$data['gzllk_ism'] 			= 'Declaracion de privacidad';
		$data['gzllk_link'] 		= '<a href="'.base_url().'pages/detail/gizlilik-politikasi ">'.$data['gzllk_ism'].'</a>';
		$data['blue_gzllk_beyan'] 	= 'No vendemos su información personal a nadie. '.$data['gzllk_link'];
		$data['rezervsyn_gvnli'] 	= 'Libro con confianza';
		$data['en_iyi_fyt'] 		= 'Mejor precio garantizado';
		$data['gonul_rhtl'] 		= '<b>Peace of mind</b>. Book ahead to skip the lines and reserve your spot.';

		// İletişim
		$data['iltsm_ust_bslk'] 	= 'Comunicación';
		$data['adres'] 				= 'Dirección';
		$data['bzml_iltsm'] 		= 'Teléfono';
		$data['msjnz'] 				= 'Tu mensaje';
		$data['gndr_btn'] 			= 'enviar';

    	// Şifremi Unuttum
		$data['sfrm_untm_bslk'] 	= 'Olvidé mi contraseña';
		$data['sfrm_untm_acklma'] 	= 'Puede restablecer su contraseña con el enlace que le hemos enviado a su correo electrónico.';
		$data['uye_mail'] 			= 'Mi direccion de correo electrónico';

		// Yardim
		$data['ytdms_bslk'] = 'Hola, ¿cómo podemos ayudarte?';

		// Geçmiş
		$data['gcms_bslk'] = 'Historial';

		// Şifre yenileme
		$data['sfre_bslk'] 		= 'Renovar contraseña';
		$data['sfre_acklm'] 	= 'Puede actualizar su nueva contraseña ';
		$data['yni_sfr'] 		= 'Nueva contraseña';
		$data['yni_sfre_tkrr'] 	= 'Repetir nueva contraseña';

		// Search
		$data['aktvte_blnd'] 	= 'Actividad encontrada.';
		$data['arma_acklma'] 	= 'Introduce tus fechas para encontrar actividades disponibles.';
		$data['arma_btn'] 		= 'Buscar';
		$data['arma_fltr'] 		= 'Filiters';
		$data['fyt_arlk'] 		= 'Rango de precios';
		$data['yer_drumu'] 		= 'Consultar disponibilidad';

		// Modul başlıkları
		$data['blue_orjnl'] 	= 'BlueEye Original';
		$data['cok_stn'] 		= 'Mejor vendido';

		// Kullanici Ayarlari
		$data['ayrlr_bslk'] 			= 'Actualice su información personal';
		$data['kllnc_adi'] 				= 'Nombre de usuario';
		$data['adresiniz'] 				= 'Su dirección';
		$data['ftura_adresi'] 			= 'Dirección de Envio';
		$data['ayrlr_tm_btn'] 			= 'Actualizar mi información';
		$data['uyligimi_dndr_blsk'] 	= 'Congelar su membresía';
		$data['uyligimi_dndr_tm_btn'] 	= 'Congelar mi membresía';

		// Giriş Sayfyasi
		$data['sfre'] 			= 'Contraseña';
		$data['sfrmi_untm'] 	= 'Olvidé mi contraseña';
		$data['kayt_ol_bslk'] 	= 'Registro';
		$data['sfre_tkrr_gir'] 	= 'repita su contraseña';
		$data['szlsm_ism'] 		= 'contrato';
		$data['szlsm_link'] 	= '<a href="'.base_url().'pages/detail/kullanim-kosullari">'.$data['szlsm_ism'].'</a>';
		$data['szlsme_kbl'] 	= 'Estoy de acuerdo con el '.$data['szlsm_link'].'.';

		// Wishlist
		$data['istek_bslk'] = 'Lista de deseos';
		$data['kldrs'] 		= 'retirar';

		// Javascript alerts
		$data['oncki_gun_secmzns'] = 'No se puede seleccionar la fecha anterior.';
		$data['onc_bas_t_sec'] = 'Primero debes seleccionar la fecha de inicio.';
		$data['ltfn_yolcu_scnz'] = 'Por favor, seleccione el número de pasajeros.';
		$data['a_18yaskck'] = 'Si tiene menos de 18 años, está estrictamente prohibido viajar solo.';
		$data['ltfn_kisi_dgru'] = 'Por favor, seleccione el número correcto de personas.';
		$data['ism_bos_olmz'] = 'No puedes dejar tu nombre en blanco.';
		$data['ism_kisa'] = 'Tu nombre es muy corto';
		$data['ism_uzun'] = 'Tu nombre es demasiado largo';
		$data['kllnc_bos_olmz'] = 'No puedes dejar el nombre de usuario en blanco.';
		$data['kllnc_ad_kisa'] = 'El nombre de usuario es demasiado corto.';
		$data['kllnc_ad_uzun'] = 'El nombre de usuario es demasiado largo.';
		$data['sfre_bs_olmz'] = 'No se puede dejar la contraseña en blanco.';
		$data['sfre_ck_kisa'] = 'La contraseña es demasiado corta.';
		$data['sfre_ck_uzun'] = 'La contraseña es demasiado larga.';
		$data['sfre_ayni_dagel'] = 'Las contraseñas no coinciden.';
		$data['ltfn_emal_adrs_dgru'] = 'Por favor escriba la dirección de correo electrónico correctamente.';
		$data['bslk_gir'] = 'Introduce el título.';
		$data['brya_yazn'] = 'Escriba aqui.';
		$data['yrm_ck_kisa'] = 'La revisión es demasiado corta.';
		$data['ltfn_zyrtc_dldr'] = 'Por favor, rellene los espacios en blanco de los visitantes.';


		// supplier form
		$data['sirkt_isim']			= 'Nombre de empresa';
		$data['acente_unvan']		= 'Titulo de agencia';
		$data['tursab_no']			= 'Número TÜRSAB';
		$data['yetksili_isim']		= 'Nombre y apellidos autorizados';
		$data['sirket_adres']		= 'Dirección';
		$data['sirket_sehir']		= 'Ciudad';
		$data['sirket_posta']		= 'Código postal';
		$data['sirket_tlfn']		= $data['tlfn_no'];
		$data['sirket_cep_tlfn']	= 'Número de teléfono móvil';
		$data['sirket_web_site']	= 'Sitios web';


		return $data;


	}

}