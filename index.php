<?php
$current_url = $_SERVER['REQUEST_URI'];
$corp_name = basename($current_url);
$corp_name=preg_replace('/[^A-Za-z0-9\-]/', '', $corp_name);
$dynamic_sheet = file_get_contents("https://script.google.com/macros/s/AKfycbzWyMzZdNSzPIng0E3Q7CHfRFDFmxEyf09qGaA7DTV7b2Z5pcSWZ9-OGyob67s4nXmnNQ/exec");
$event_data_decoded = json_decode($dynamic_sheet);
$event_banner_data = $event_data_decoded->user;
 
$matching_event = null;
 
foreach ($event_banner_data as $event) {
        
    if ($event->Corp_Name === $corp_name) {
            
       
        $matching_event = $event;
        break; // Match found, no need to continue looping
    }
}
 
 
?>
 
 
 
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $post->post_title; ?></title>
    <style>
        @font-face {
            font-family: "Source Sans Pro";
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: local("Source Sans Pro Light"), local("SourceSansPro-Light"),
                url(https://fonts.gstatic.com/s/sourcesanspro/v13/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwlxdu.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193,
                U+2212, U+2215, U+FEFF, U+FFFD;
        }
 
        @font-face {
            font-family: "Source Sans Pro";
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local("Source Sans Pro Regular"), local("SourceSansPro-Regular"),
                url(https://fonts.gstatic.com/s/sourcesanspro/v13/6xK3dSBYKcSV-LCoeQqfX1RYOo3qOK7l.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193,
                U+2212, U+2215, U+FEFF, U+FFFD;
        }
 
        @font-face {
            font-family: "Source Sans Pro";
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: local("Source Sans Pro SemiBold"), local("SourceSansPro-SemiBold"),
                url(https://fonts.gstatic.com/s/sourcesanspro/v13/6xKydSBYKcSV-LCoeQqfX1RYOo3i54rwlxdu.woff2) format("woff2");
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6,
                U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193,
                U+2212, U+2215, U+FEFF, U+FFFD;
        }
 
        @font-face {
            font-family: "Source Sans Pro";
            font-style: italic;
            font-weight: 700;
            font-display: swap;
            src: local("Source Sans Pro Bold Italic"),
                local("SourceSansPro-BoldItalic"),
                url(https://fonts.gstatic.com/s/sourcesanspro/v21/6xKwdSBYKcSV-LCoeQqfX1RYOo3qPZZclSdh18S0xR41YDw.woff2) format("woff2");
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF,
                U+A640-A69F, U+FE2E-FE2F;
        }
 
        * {
            margin: 0%;
            padding: 0%;
            box-sizing: border-box;
            font-family: Source Sans Pro;
        }
 
        a {
            text-decoration: none;
            color: #000;
        }
 
        h1 {
            font-size: 2rem;
        }
 
        h2 {
            font-size: 1.5rem;
        }
 
        h3 {
            font-size: 1.17rem;
        }
 
        h4 {
            font-size: 1rem;
        }
 
        ul {
            list-style: none;
        }
 
        li {
            list-style: none;
        }
 
        button {
            cursor: pointer;
        }
 
        .nb_blog_main_container {
            max-width: 1370px;
            margin-inline: auto;
            overflow: hidden;
            padding-inline: 20px;
        }
 
        @media screen and (max-width: 660px) {
            .nb_blog_main_container {
                padding-inline: 10px;
            }
        }
 
        /* nav bar */
        nav {
            position: fixed;
            top: 0;
            z-index: 999;
            width: 100%;
            box-shadow: 0px 2px 14.2px 0px #00000026;
            background-color: #f8f8f8;
        }
 
        .nb_corporate_partners_navbar {
            display: flex;
            align-items: center;
            margin-block: 1rem;
            justify-content: space-between;
        }
 
        .nav_left {
            display: flex;
            align-items: center;
        }
 
        .nav_right a {
            background-color: transparent;
            color: #D31831;
            border: 1px solid #D31831;
            padding: 8px 14px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 14px;
            font-weight: 600;
            line-height: 24px;
        }
 
        .other_logos img {
            border-radius: 4px;
        }
 
 
        @media screen and (max-width: 660px) {
            .nb_corporate_partners_logo img {
                width: 185px;
                height: 27px;
            }
 
            .nav_right a {
                display: none;
            }
        }
 
        .nb_corporate_partners_logo {
            border-right: 1px solid #000000;
            padding-right: 1rem;
            margin-right: 1rem;
        }
 
        /*  */
        .nb_corporate_partners_first_section {
            width: 100%;
            height: 333px;
            background-color: #181c51;
            margin-top: 4rem;
        }
 
        /*  */
 
        /* hero section */
        .nb_corporate_partners_hero_section {
            width: 85%;
            margin-inline: auto;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-top: -18rem;
        }
 
        .nb_corporate_partners_hero_left {
            width: 55%;
            height: 372px;
        }
 
        .nb_corporate_partners_hero_left img,
        .nb_corporate_partners_slider img {
            width: 100%;
            height: 100%;
            border-radius: 12px;
        }
 
        .nb_corporate_partners_hero_right {
            overflow: hidden;
            width: 30%;
            position: fixed;
            top: 7rem;
            left: 60%;
            background-color: #FFFFFF;
            border-radius: 12px;
            box-shadow: 0px 0px 15px 0px #00000026;
        }
 
        .nb_corporate_form_container {
            padding: 28px 24px 12px 24px;
        }
 
        .nb_corporate_partners_hero_right h1 {
            font-size: 20px;
            font-weight: 700;
            line-height: 25.14px;
            text-align: left;
            margin-bottom: 8px;
		
        }
 
        .connect_with_us,
        .service_discount {
            display: flex;
            align-items: center;
            gap: 5px;
        }
 
        .nb_corporate_partners_hero_right p {
            font-size: 14px;
            font-weight: 400;
            line-height: 17.6px;
            text-align: left;
            white-space: nowrap;
        }
 
        .linear_border {
            content: "";
            background: linear-gradient(90deg, #aaaaaa 0%, #f4f4f4 100%);
            width: 70%;
            height: 1.5px;
        }
 
        .linear_border.rotate {
            rotate: 180deg;
        }
 
        .nb_corporate_partners_connect_form,
        .nb_service_connect_form {
            text-align: center;
            margin-block: 12px;
        }
 
        .nb_corporate_partners_connect_form input,
        .nb_corporate_partners_connect_form select,
        .nb_service_connect_form input,
        .nb_service_connect_form select {
            width: 100%;
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #cfcfcf;
            outline: none;
            color: #363636;
            font-size: 14px;
            font-weight: 400;
            line-height: 24px;
            text-align: left;
            margin-bottom: 24px;
        }
 
        .nb_corporate_partners_connect_form button {
            border: none;
            background-color: #419387;
            color: #ffffff;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            line-height: 24px;
            margin-inline: auto;
            display: flex;
            align-items: center;
            gap: 10px;
        }
 
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
 
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }
 
        .submitMsg {
            position: fixed;
            top: -100%;
            left: 50%;
            padding: 40px;
            border-radius: 12px;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            gap: 16px;
            text-align: center;
            align-items: center;
            justify-content: center;
            transform: translate(-50%, -50%);
            z-index: 9999;
            transition: top 0.8s ease-in-out;
			max-width: 460px;
        }
 
        .submitMsg.submitted {
            top: 50%;
        }
 
 
        .serviceSelect {
            position: fixed;
            top: -100%;
            left: 50%;
            padding-block: 40px;
            border-radius: 12px;
            background-color: #ffffff;
            width: 645px;
            justify-content: center;
            align-items: center;
            transform: translate(-50%, -50%);
            z-index: 9999;
            transition: top 0.8s ease-in-out;
        }
 
        .select_head {
            display: flex;
            align-items: center;
        }
 
        .select_head h2 {
            white-space: nowrap;
            font-size: 20px;
            font-weight: 600;
            line-height: 25.14px;
            text-align: center;
 
        }
 
        .select_categ {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-block: 36px;
			padding-inline: 12px;
        }
 
        .categ_options {
            padding: 8px 12px;
            border-radius: 100px;
            border: 1px solid #256A14;
            color: #256A14;
            font-size: 16px;
            font-weight: 600;
            line-height: 20.11px;
            text-align: center;
            cursor: pointer;
        }
 
        .categ_options.selected {
            background-color: #256A14;
            color: #FFFFFF;
        }
 
        .unlock_button {
            text-align: center;
        }
 
        .unlock_button button {
            padding: 8px 14px;
            background-color: #419387;
            border-radius: 8px;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            line-height: 24px;
            border: none;
        }
 
        @media screen and (max-width: 660px) {
 
            .serviceSelect,
            .submitMsg {
                width: 90%;
            }
        }
 
 
        /* main */
        .nb_corporate_partners_main_section {
            width: 85%;
            display: flex;
            margin-inline: auto;
            margin-block: 3rem;
        }
 
        .main_sections_container {
            width: 55%;
        }
 
        .section_heading {
            color: #222222;
            font-size: 24px;
            font-weight: 700;
            line-height: 30.17px;
            text-align: left;
        }
 
        .sub_head {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 8px;
        }
 
        .sub_head p {
            white-space: nowrap;
        }
 
        .linear_border {
            content: "";
            background: linear-gradient(90deg, #AAAAAA 0%, #F4F4F4 100%);
            width: 80%;
            height: 1.5px;
        }
 
 
 
 
 
        /* home service */
        .nb_corporate_partners_home_service,
        .nb_corporate_partners_plans,
        .nb_corporate_partners_pm {
            box-shadow: 0px 0px 11.3px 0px #0000001A;
            padding: 40px 20px 28px 20px;
            border-radius: 12px;
            margin-bottom: 3rem;
        }
 
        .home_service_banner {
            margin-block: 20px;
        }
 
        .home_service_banner img {
            border-radius: 12px;
            overflow: hidden;
        }
 
        .home_service_cards,
        .nb_plans_cards,
        .pm_cards {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            overflow-x: scroll;
            scroll-behavior: smooth;
            padding-block: 12px 20px;
            gap: 8px;
        }
 
        .nb_plans_cards,
        .pm_cards {
            padding-top: 28px;
        }
 
        .home_service_cards::-webkit-scrollbar,
        .nb_plans_cards::-webkit-scrollbar,
        .pm_cards::-webkit-scrollbar {
            display: none;
        }
 
        .service_card {
            background-color: #F0F4FC;
            border: 0.5px solid #666BB1;
            padding: 13px 12px;
            border-radius: 12px;
            text-align: center;
            width: 160px;
            cursor: pointer;
            flex: 0 0 auto;
            transition: box-shadow 0.3s ease-in-out;
        }
 
        .service_card:hover {
            box-shadow: 0px 11px 17.6px 0px #0000001A;
            border: none;
        }
 
        .service_card h3 {
            color: #000000;
            font-size: 18px;
            font-weight: 600;
            line-height: 22.63px;
            text-align: center;
 
        }
 
        .lowest_qot {
            position: absolute;
            top: 0;
            left: 28px;
            background-color: #FFE8C3;
            border: 0.5px solid #000000;
            border-radius: 50px;
            padding: 2px 12px;
            color: #000000;
            font-size: 14px;
            font-weight: 400;
            line-height: 17.6px;
            text-align: center;
        }
 
        .service_card:hover .lowest_qot {
            border: none;
        }
 
        .carousel {
            position: relative;
            height: 100%;
        }
 
        .slides {
            display: flex;
            overflow: hidden;
            height: 100%;
        }
 
        .slide {
            display: none;
            width: 100%;
        }
 
        .slide.active {
            display: block;
        }
 
        .radio-buttons {
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }
 
        .radio-button {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: transparent;
            border: 1px solid #000000;
            cursor: pointer;
            margin-right: 5px;
        }
 
        .radio-button.active {
            background-color: #000000;
        }
 
        .oc_sercive_carousel_main {
            padding: 24px 20px;
        }
 
 
 
        /* nb plans */
        .plan_card {
            padding: 20px;
            border-radius: 12px;
            width: 210px;
            flex: 0 0 auto;
        }
 
        .plan_card:nth-child(1) {
            background: linear-gradient(124.55deg, #D9F0EF 0%, #81D0D0 100%);
        }
 
        .plan_card:nth-child(2) {
            background: linear-gradient(124.27deg, #C7F0FF 0.16%, #00668A 100.16%);
        }
 
        .plan_card:nth-child(3) {
            background: linear-gradient(124.55deg, #FFDBDA 0%, #F25F5C 100%);
        }
 
        .plan_card h3 {
            font-size: 18px;
            font-weight: 600;
            line-height: 22.63px;
        }
 
        .plan_card:nth-child(1) h3 {
            color: #083F3F;
        }
 
        .plan_card:nth-child(2) h3 {
            color: #042F3E;
        }
 
        .plan_card:nth-child(3) h3 {
            color: #520C0A;
        }
 
        .plan_card p {
            color: #000000;
            font-size: 16px;
            font-weight: 400;
            line-height: 20.11px;
        }
 
        .plan_card p span {
            font-size: 20px;
            font-weight: 700;
            line-height: 25.14px;
        }
 
        .plan_card button {
            padding: 8px 14px;
            border-radius: 8px;
            background-color: #FFFFFF;
            border: 1px solid #FFFFFF;
            width: 100%;
            color: #419387;
            font-size: 14px;
            font-weight: 600;
            line-height: 24px;
            margin-top: 20px;
        }
 
        /* pm */
        .pm_cards {
            justify-content: flex-start;
            gap: 40px;
        }
 
        .pm_card {
            padding: 20px;
            border-radius: 12px;
            width: 242px;
            border: 1px solid #419387;
            flex: 0 0 auto;
        }
 
        .pm_card p {
            color: #083F3F;
            font-size: 16px;
            font-weight: 400;
            line-height: 20.11px;
        }
 
        .pm_card p span {
            color: #083F3F;
            font-size: 18px;
            font-weight: 600;
            line-height: 22.63px;
        }
 
        .pm_card button {
            width: 100%;
            background-color: #419387;
            padding: 8px 14px;
            border-radius: 8px;
            border: none;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            line-height: 24px;
            margin-top: 20px;
        }
 
 
        /* invest cards */
        .nb_invest_opt {
            box-shadow: 0px 0px 15px 0px #0000001a;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 3rem;
        }
 
        .options {
            padding: 24px 40px;
        }
 
        .options h2 {
            font-size: 20px;
            font-weight: 700;
            line-height: 25.14px;
            text-align: left;
            color: #222222;
        }
 
        .opt_cards {
            display: flex;
            justify-content: space-between;
            margin-block: 24px;
        }
 
        .opt_crd {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            color: #222222;
            font-size: 18px;
            font-weight: 600;
            line-height: 22.63px;
            text-align: center;
        }
 
        .opt_crd br {
            display: none;
        }
 
        .partners_button {
            border: 2px solid #419387;
            padding: 8px 14px;
            background-color: transparent;
            width: 100%;
            border-radius: 8px;
            color: #419387;
            font-size: 20px;
            font-weight: 600;
            line-height: 24px;
            text-align: center;
        }
 
 
        /* slider */
        .nb_corporate_partners_slider {
            width: 100%;
            height: 372px;
            padding: 20px;
        }
 
        /* faqs */
        .nb_corporate_faqs {
            box-shadow: 0px 0px 15px 0px #0000001a;
            padding: 24px 20px;
            border-radius: 8px;
			display: none;
        }
 
        .accordian {
            text-align: left;
            background-color: rgba(255, 255, 255, 0.797);
            margin-bottom: 16px;
            border-radius: 8px;
            padding-block: 10px;
            border-bottom: 1px solid #e5e7eb;
        }
 
        .question {
            cursor: pointer;
            margin-block: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #363636;
        }
 
        .question h3 {
            width: 85%;
            font-size: 15px;
            font-weight: 600;
            line-height: 18.86px;
            text-align: left;
        }
 
        .icon {
            cursor: pointer;
            margin-right: 16px;
            transition: transform 0.2s;
        }
 
        .icon.toggle {
            transform: rotate(45deg);
        }
 
        .answer {
            color: #363636cc;
            font-size: 14px;
            font-weight: 400;
            line-height: 17.6px;
            text-align: left;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s;
            width: 90%;
        }
 
        @media screen and (max-width: 991px) {
 
            .nb_corporate_partners_hero_section,
            .nb_corporate_partners_main_section {
                width: 95%;
            }
 
            .nb_corporate_partners_hero_left,
            .nb_corporate_partners_slider {
                height: 315px;
            }
 
            .nb_corporate_partners_hero_right {
                width: 40%;
                left: 58%;
            }
        }
 
        @media screen and (max-width: 775px) {
            .nb_corporate_partners_first_section {
                display: none;
            }
 
            .nb_corporate_partners_hero_section {
                margin-top: 5rem;
            }
 
            .nb_corporate_partners_hero_right {
                position: unset;
                width: 100%;
            }
 
            .nb_corporate_partners_hero_section {
                flex-direction: column;
                gap: 10px;
            }
 
            .nb_corporate_partners_hero_left,
            .nb_corporate_partners_slider {
                width: 100%;
                height: 230px;
                padding: 0;
            }
 
            .main_sections_container {
                width: 100%;
            }
 
            .nb_invest_opt {
                border-radius: 0;
            }
 
            .options {
                padding: 24px 20px;
            }
 
            .opt_crd br {
                display: block;
            }
        }
 
        @media screen and (max-width: 660px) {
 
            .nb_corporate_partners_hero_section,
            .nb_corporate_partners_main_section {
                width: 100%;
            }
 
            .nb_corporate_partners_hero_section {
                margin-top: 4rem;
            }
 
            .nb_corporate_partners_main_section {
                margin-block: 1rem;
            }
 
            .nb_corporate_partners_hero_left img,
            .nb_corporate_partners_hero_right,
            .nb_corporate_partners_slider img {
                border-radius: 0;
            }
 
            .nb_corporate_partners_hero_right {
                margin-top: 1rem;
            }
 
            .nb_invest_opt {
                margin-bottom: 1rem;
            }
 
            .opt_crd img {
                width: 50px;
                height: 50px;
            }
 
            .opt_crd {
                font-size: 14px;
                line-height: 17.6px;
                font-weight: 600;
            }
 
            .partners_button {
                font-size: 16px;
                line-height: 24px;
            }
 
            .nb_corporate_form_container {
                padding: 28px 24px 12px 24px;
            }
 
            /* home service */
            .nb_corporate_partners_home_service,
            .nb_corporate_partners_plans,
            .nb_corporate_partners_pm {
                padding: 24px 20px 8px 20px;
                margin-bottom: 1rem;
            }
 
            .section_heading {
                font-size: 20px;
                line-height: 25.14px;
            }
 
            .sub_head {
                margin-top: 4px;
            }
 
            .sub_head p {
                font-size: 14px;
            }
 
            .service_card {
                width: 135px;
            }
 
            .service_card img {
                width: 50px;
                height: 50px;
            }
 
            .home_service_cards,
            .nb_plans_cards,
            .pm_cards {
                gap: 12px;
            }
 
            .nb_plans_cards,
            .pm_cards {
                padding-top: 12px;
            }
 
            .lowest_qot {
                padding: 1.7px 10.7px;
                font-size: 11.9px;
                line-height: 14.96px;
                left: 20px;
            }
 
            .home_service_banner {
                margin-block: 12px;
            }
 
            .service_card h3 {
                font-size: 14px;
            }
 
            /* nb plan */
            .plan_card {
                width: 160px;
                padding: 18px;
                border-radius: 10.8px;
            }
 
            .plan_card h3,
            .plan_card p span {
                font-size: 16px;
                line-height: 20.11px;
            }
 
            .plan_card p {
                font-size: 14px;
                line-height: 17.6px;
            }
 
            .plan_card button {
                margin-top: 18px;
                padding: 7.2px 12.6px;
                border-radius: 7.2px;
                font-size: 14px;
                line-height: 17.6px;
            }
        }
 
 
 
        .service_forms {
            display: flex;
            position: fixed;
            top: -100%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 12px;
            overflow: hidden;
            z-index: 9999;
            width: 641px;
            transition: top 0.8s ease-in-out;
        }
 
        .service_forms_2 {
            position: fixed;
            top: -100%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 12px;
            overflow: hidden;
            z-index: 9999;
            width: 436px;
            transition: top 0.8s ease-in-out;
        }
 
        .service_details {
            background-color: #419387;
            padding: 24px;
        }
 
        .service_details h2 {
            color: #FFFFFF;
            font-size: 18px;
            font-weight: 700;
            line-height: 24px;
            text-align: left;
        }
 
        .service_list {
            margin-top: 32px;
        }
 
        .service_list li {
            display: flex;
            align-items: center;
            color: #FFFFFF;
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            text-align: left;
            gap: 6px;
            margin-bottom: 20px;
        }
 
        .service_list-2 {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 10px;
        }
 
         .service_list-2 li {
            color: #FFFFFF;
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 6px;
        }
 
        .service_form_container {
            padding: 24px;
            background-color: #FFFFFF;
        }
 
        .service_form_container h2 {
            color: #000000;
            font-size: 20px;
            font-weight: 700;
            line-height: 25.14px;
            text-align: left;
        }
 
        .service_discount p {
            color: #000000;
            font-size: 14px;
            font-weight: 400;
            line-height: 17.6px;
            white-space: nowrap;
        }
 
        .nb_service_connect_form button {
            background: #419387;
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 600;
            line-height: 24px;
        }
 
 
        @media screen and (max-width: 660px) {
 
            .service_forms_2,
            .service_forms {
                width: 90%;
            }
 
            .service_forms {
                flex-direction: column;
            }
 
            .service_details,
            .service_form_container {
                padding: 12px;
            }
 
            .service_list {
                margin-top: 12px;
            }
 
            .service_list li {
                margin-bottom: 12px;
                font-size: 14px;
            }
 
            .service_list li img {
                width: 35px;
                height: 35px;
            }
 
            .nb_service_connect_form input {
                margin-bottom: 12px;
            }
        }
    </style>
</head>
 
<body>
    <nav>
        <div class="nb_corporate_partners_navbar nb_blog_main_container">
            <div class="nav_left">
                <div class="nb_corporate_partners_logo">
                    <img id="mainLogo"
                        src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/NB-Corporate-Logo-02-2.png"
                        alt="logo" width="276" height="30" />
                </div>
                <div class="other_logos">
                    <img id="otherLogo" src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/mobikwik.png"
                        alt="logo" width="100%" height="50" />
                </div>
            </div>
           <div class="nav_right">
        <a href="tel:83069 97513">
          <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M9.29078 19.8705C8.57324 19.6336 7.65098 19.0412 6.42007 17.6997C4.92451 16.0645 3.81861 14.6456 2.5943 12.2224C1.41503 9.88252 0.934547 8.46107 0.45605 5.88431C-0.0849674 2.97467 0.572146 1.76016 1.01238 1.29373C1.53743 0.73588 2.12128 0.49133 2.83685 0.293545C3.24192 0.185375 3.6561 0.114758 4.07413 0.0825889C4.11611 0.078925 4.15527 0.0751465 4.19028 0.071624C4.3993 0.0497575 4.7159 0.0169494 5.02142 0.264585C5.22559 0.429021 5.37454 0.676716 5.59403 1.10586C6.04445 1.98504 6.47278 3.75326 6.57161 4.5848C6.63734 5.14496 6.68112 5.51485 6.56278 5.87441C6.42381 6.29523 6.1049 6.54982 5.73228 6.81522C5.6624 6.8651 5.59386 6.91217 5.5274 6.95788C5.12628 7.23302 5.02982 7.31896 5.00762 7.52196C4.96373 7.93015 5.20036 9.26658 5.87402 10.6006C6.54767 11.9346 7.46062 12.8712 7.81634 13.0791C8.00015 13.1867 8.1297 13.1586 8.60471 12.9942C8.67283 12.9707 8.7429 12.9461 8.81555 12.9224C9.30365 12.7604 9.68126 12.6564 10.0922 12.7922L10.0944 12.7929C10.4521 12.911 10.7071 13.1672 11.1299 13.5905C11.6814 14.1428 12.8951 15.5426 13.3371 16.43C13.5521 16.8614 13.6634 17.128 13.6745 17.3897C13.6911 17.7836 13.4758 18.017 13.3339 18.174C13.3102 18.2 13.2841 18.2284 13.2561 18.2603C12.9803 18.5759 12.676 18.8654 12.3471 19.1251C11.7634 19.5804 11.2181 19.9021 10.4556 19.9915C10.0632 20.0399 9.66487 19.9986 9.29078 19.8705Z"
              fill="#D31831" />
          </svg>

         <span id="contact_num"> 83069 97513</span>
        </a>
      </div>
        </div>
 
    </nav>
 
    <!-- background color -->
    <section class="nb_corporate_partners_first_section"></section>
 
    <!-- hero section -->
    <section class="nb_corporate_partners_hero_section">
        <div class="nb_corporate_partners_hero_left">
            <div class="carousel" id="carousel-1">
                <div class="slides">
                    <div class="slide active" id="slide-0">
                        <picture>
                            <source media="(max-width: 660px)" srcset="
                            https://www.nobroker.in/prophub/wp-content/uploads/2024/06/mobiwik-29-1.png
                  " />
 
                            <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/mobiwik-29-1.png"
                                alt="Slide 1" width="100%" />
                        </picture>
                    </div>
                    <div class="slide" id="slide-1">
                        <picture>
                            <source media="(max-width: 660px)" srcset="
                            https://www.nobroker.in/prophub/wp-content/uploads/2024/06/4bbbeb72b7fba440ceef035a050c35b7-scaled.jpeg
                  " />
 
                            <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/4bbbeb72b7fba440ceef035a050c35b7-scaled.jpeg"
                                alt="Slide 2" width="100%" />
                        </picture>
                    </div>
                    <div class="slide" id="slide-2">
                        <picture>
                            <source media="(max-width: 660px)" srcset="
                            https://www.nobroker.in/prophub/wp-content/uploads/2024/06/b0d672dc1e76ca0f70cd9cae476d0442-scaled.jpeg
                  " />
 
                            <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/b0d672dc1e76ca0f70cd9cae476d0442-scaled.jpeg"
                                alt="Slide 2" width="100%" />
                        </picture>
                    </div>
                </div>
 
                <div class="radio-buttons">
                    <div class="radio-button active" onclick="goToSlide(0)"></div>
                    <div class="radio-button" onclick="goToSlide(1)"></div>
                    <div class="radio-button" onclick="goToSlide(2)"></div>
                </div>
            </div>
        </div>
 
        <div class="nb_corporate_partners_hero_right">
            <div class="nb_corporate_form_container">
                <h1>
                    Hey, <?php echo $matching_event->partners_name; ?> <span id='employee'>Employees</span> 
                </h1>
                <div class="connect_with_us">
                    <p>Claim your special offer NOW!</p>
                    <div class="linear_border"></div>
                </div>
                <form class="nb_corporate_partners_connect_form" id="nb_corporate_partners_MainFormId">
                    <input type="text" placeholder="Name" name="corporate_partners_input_name"
                        id="corporate_partners_input_name_id" class="corporate_partners_form_input" required />
                    <input type="number" placeholder="Phone number" name="corporate_partners_input_phone"
                        id="corporate_partners_input_phone_id" class="corporate_partners_form_input" required />
                    <input type="email" placeholder="Email ID" name="corporate_partners_input_email"
                        id="corporate_partners_input_email_id" class="corporate_partners_form_input" required />
<!--                     <select for="city" id="citySelect_id" name="citySelect" class="corporate_partners_form_input"
                        required>
                        <option hidden value="">City</option>
                        <option value="Bengaluru">Bengaluru</option>
                    </select> -->
                    <input type="hidden" id="dateid" name="dateName" class="dateclass"
                        class="corporate_partners_form_input" />
                    <input type="hidden" id="url" name="urlname" class="urlclass"
                        class="corporate_partners_form_input" />
 
                    <input type="hidden" id="corporatePartners_campaignId" name="CORPORATEPARTNERSCAMPAIGN"
                        class="corporate_partners_form_input" />
 
                    <input type="hidden" class="categoriesOptionClass" name="selectedCatName">
                    <button onclick="submit_mobile_form(event)">Select services
                        <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.4716 15.7637L20.5 8.03942L12.4716 0.315174C12.3991 0.224039 12.307 0.14888 12.2015 0.094783C12.096 0.0406864 11.9796 0.00891604 11.8601 0.00162226C11.7407 -0.00567153 11.621 0.0116821 11.5092 0.0525077C11.3974 0.0933333 11.296 0.156678 11.212 0.238253C11.128 0.319829 11.0633 0.417731 11.0222 0.525331C10.9812 0.632931 10.9647 0.747717 10.9741 0.861919C10.9834 0.97612 11.0182 1.08707 11.0763 1.18726C11.1343 1.28745 11.2141 1.37454 11.3104 1.44263L17.317 7.23981L1.33542 7.23981C1.11386 7.23981 0.901363 7.32405 0.74469 7.47401C0.588018 7.62396 0.5 7.82735 0.5 8.03942C0.5 8.25149 0.588018 8.45487 0.74469 8.60483C0.901363 8.75479 1.11385 8.83903 1.33542 8.83903L17.317 8.83903L11.3104 14.6362C11.1542 14.7868 11.0668 14.9906 11.0676 15.2028C11.0684 15.415 11.1572 15.6182 11.3145 15.7677C11.4718 15.9172 11.6848 16.0007 11.9065 16C12.1282 15.9992 12.3405 15.9142 12.4967 15.7637L12.4716 15.7637Z"
                                fill="white" />
                        </svg>
 
                    </button>
                </form>
 
            </div>
 
        </div>
        </div>
    </section>
    <div class="overlay"></div>
 
    <div class="serviceSelect">
        <div class="select_head">
            <div class="linear_border rotate"></div>
            <h2>Select services you would need</h2>
            <div class="linear_border"></div>
        </div>
 
        <div class="select_categ">
            <div class="categ_options">
                Rent a House
            </div>

            <div class="categ_options">
                Buy a House
            </div>

            <div class="categ_options">
                Sell a House
            </div>

            <div class="categ_options">
                Packers & Movers
            </div>

            <div class="categ_options">
                Cleaning
            </div>

            <div class="categ_options">
                Painting
            </div>

            <div class="categ_options">
                Interior Services
            </div>

            <div class="categ_options">
                Legal Services
            </div>
        </div>
        <div class="unlock_button">
            <button onclick="submit_form(event)">Unlock my offers</button>
 
        </div>
        <div class="loader" style="display: none;
        justify-content: center;
        margin-top: 2%;
    ">
            <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/01/icons8-loading.gif" alt="">
        </div>
    </div>
    <div class="submitMsg">
        <svg width="84" height="83" viewBox="0 0 84 83" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M0.5 41.5C0.5 30.4935 4.87231 19.9378 12.6551 12.1551C20.4378 4.37231 30.9935 0 42 0C53.0065 0 63.5622 4.37231 71.3449 12.1551C79.1277 19.9378 83.5 30.4935 83.5 41.5C83.5 52.5065 79.1277 63.0622 71.3449 70.8449C63.5622 78.6277 53.0065 83 42 83C30.9935 83 20.4378 78.6277 12.6551 70.8449C4.87231 63.0622 0.5 52.5065 0.5 41.5ZM39.6317 59.262L63.5247 29.3931L59.2087 25.9403L38.8349 51.3991L24.404 39.3752L20.8627 43.6248L39.6317 59.262Z"
                fill="#419387" />
        </svg>
        <h2>We’ve got your response</h2>
        <p>Our team will get back to you shortly!</p>
    </div>
 
    <main class="nb_corporate_partners_main_section">
        <section class="main_sections_container">
 
            <!-- home service -->
            <section class="nb_corporate_partners_home_service">
                <h2 class="section_heading">NoBroker Home Services</h2>
                <div class="sub_head">
                    <p>at special discounts</p>
                    <div class="linear_border"> </div>
                </div>
                <div class="home_service_banner">
                    <div class="carousel" id="carousel-3">
                        <div class="slides">
                            <div class="slide active" id="slide-0">
                                <picture>
                                    <source media="(max-width: 660px)"
                                        srcset="https://www.nobroker.in/prophub/wp-content/uploads/2024/05/mob_ex_service1.png">
 
                                    <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/05/ex_service1.png"
                                        alt="Slide 1" width="100%">
                                </picture>
                            </div>
                            <div class="slide" id="slide-1">
                                <picture>
                                    <source media="(max-width: 660px)"
                                        srcset="https://www.nobroker.in/prophub/wp-content/uploads/2024/05/mob_ex_service2.png">
 
                                    <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/05/ex_service2.png"
                                        alt="Slide 2" width="100%">
                                </picture>
                            </div>
 
                        </div>
 
                        <div class="radio-buttons">
                            <div class="radio-button active" onclick="goToSlide(0)"></div>
                            <div class="radio-button" onclick="goToSlide(1)"></div>
                        </div>
                    </div>
 
                </div>
 
                <div class="home_service_cards">
                    <div class="service_card" onclick="showPopupForm(event ,'Packers & Mover')">
                        <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group.svg" alt="icon"
                            width="60" height="60">
                        <h3>Packers & Movers</h3>
 
                        <div class="lowest_qot">
                            Lowest Quote*
                        </div>
                    </div>
                    <!--  -->
 
                    <div class="service_card" onclick="showPopupForm(event ,'Cleaning')">
                        <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1.svg" alt="icon"
                            width="60" height="60">
                        <h3>Cleaning</h3>
                    </div>
 
                    <div class="service_card" onclick="showPopupForm(event ,'AC Servicing')">
                        <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1-1.svg" alt="icon"
                            width="60" height="60">
                        <h3>AC Servicing</h3>
                    </div>
 
                    <div class="service_card" onclick="showPopupForm(event ,'Painting')">
                        <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-2.svg" alt="icon"
                            width="60" height="60">
                        <h3>Painting</h3>
                    </div>
                </div>
            </section>
 
            <div class="service_forms">
                <div class="service_details">
                    <h2>AC Servicing</h2>
                    <ul class="service_list">
                        <li>
                            <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004286.svg"
                                alt="icon">
                            AC Service
                        </li>
 
                        <li>
                            <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004285.svg"
                                alt="icon">
                            AC Repair
                        </li>
 
                        <li>
                            <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004287.svg"
                                alt="icon">
                            AC Gas Chaning
                        </li>
 
                        <li>
                            <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004284.svg"
                                alt="icon">
                            AC Installation/
                            Uninstallation
                        </li>
                    </ul>
                </div>
 
                <!-- main form -->
                <div class="service_form_container">
                    <h2>
                        AC Servicing
                    </h2>
                    <div class="service_discount">
                        <p>Up to <span style="font-weight: 700;">30%</span> off</p>
                        <div class="linear_border"></div>
                    </div>
                    <form class="nb_service_connect_form" id="nb_service_MainFormId">
                        <input type="text" placeholder="Name" name="service_input_name" id="service_input_name_id"
                            class="service_form_input" required />
                        <input type="number" placeholder="Phone number" name="service_input_phone"
                            id="service_input_phone_id" class="service_form_input" required />
                        <input type="email" placeholder="Email ID" name="service_input_email"
                            id="service_input_email_id" class="service_form_input" required />
                        <select for="city" id="Service_Select" name="Service_Select" class="service_form_input"
                            required>
 
                        </select>
                        <input type="hidden" id="dateid1" name="dateName" class="dateclass"
                            class="service_form_input" />
                        <input type="hidden" id="url1" name="urlname" class="urlclass" class="service_form_input" />
 
                        <input type="hidden" id="corporatePartners_campaignId" name="CORPORATEPARTNERSCAMPAIGN"
                            class="service_form_input" />
 
                        <input type="hidden" class="categoriesOptionClass" name="selectedCatName">
                        <button onclick="submit_service_form(event)">Let’s Connect
 
                        </button>
                    </form>
                    <div class="loader" style="display: none;
                    justify-content: center;
                    margin-top: 2%;
                ">
                        <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/01/icons8-loading.gif" alt="">
                    </div>
                </div>
            </div>
 
 
            <div class="service_forms_2">
                <div class="service_details">
                    <h2>Home cleaning</h2>
                    <ul class="service_list-2">
                        <li>
                            • Full house deep cleaning
                        </li>
 
                        <li>
                            • Full house basic cleaning
                        </li>
 
                        <li>
                            • Bathroom cleaning
                        </li>
 
                        <li>
                            • Kitchen cleaning
                        </li>
                        <li>
                            • Sofa cleaning
                        </li>
                    </ul>
                </div>
 
                <!-- main form -->
                <div class="service_form_container">
                    <h2>
                        Explore home cleaning
                    </h2>
                    <div class="service_discount">
                        <p>Starting @ <span style="font-weight: 700;"> ₹359</span></p>
                        <div class="linear_border"></div>
                    </div>
                    <form class="nb_service_connect_form" id="nb_service_MainFormId2">
                        <input type="text" placeholder="Name" name="service_input_name" id="service_input_name_id2"
                            class="service_form_input" required />
                        <input type="number" placeholder="Phone number" name="service_input_phone"
                            id="service_input_phone_id2" class="service_form_input" required />
                        <input type="email" placeholder="Email ID" name="service_input_email"
                            id="service_input_email_id2" class="service_form_input" required />
                        <select for="city" id="Service_Select2" name="Service_Select" class="service_form_input"
                            required>
                            <option hidden value="">Home Cleaning</option>
                            <option value="Home Cleaning">Home Cleaning</option>
                        </select>
                        <input type="hidden" id="dateid2" name="dateName" class="dateclass"
                            class="service_form_input" />
                        <input type="hidden" id="url2" name="urlname" class="urlclass" class="service_form_input" />
 
                        <input type="hidden" id="corporatePartners_campaignId2" name="CORPORATEPARTNERSCAMPAIGN"
                            class="service_form_input" />
 
                        <input type="hidden" class="categoriesOptionClass" name="selectedCatName">
                        <button onclick="submit_service_form2(event)">Let’s Connect
 
                        </button>
                    </form>
                    <div class="loader" style="display: none;
                    justify-content: center;
                    margin-top: 2%;
                ">
                        <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/01/icons8-loading.gif" alt="">
                    </div>
                </div>
            </div>
 
            <!-- nb plans -->
            <section class="nb_corporate_partners_plans">
                <h2 class="section_heading">Explore NoBroker Plans</h2>
                <div class="sub_head">
                    <p>For ZERO brokerage</p>
                    <div class="linear_border"> </div>
                </div>
 
                <div class="nb_plans_cards">
                    <div class="plan_card">
                        <h3>Tenant Plans</h3>
                        <p>starting <span>₹1,499</span></p>
 
                        <button onclick="showPopupForm(event ,'Tenant')">Know More</button>
                    </div>
 
                    <div class="plan_card">
                        <h3>Owner Plans</h3>
                        <p>starting <span>₹2,999</span></p>
 
                        <button onclick="showPopupForm(event ,'Owner')">Know More</button>
                    </div>
 
                    <div class="plan_card">
                        <h3>Buyer Plans</h3>
                        <p>starting <span>₹799</span></p>
 
                        <button onclick="showPopupForm(event ,'Buyer')">Know More</button>
                    </div>
                </div>
            </section>
 
            <!-- property management -->
            <section class="nb_corporate_partners_pm">
                <h2 class="section_heading">Comprehensive Property Management Services</h2>
                <div class="sub_head">
                    <p>As per your needs</p>
                    <div class="linear_border"> </div>
                </div>
 
                <div class="pm_cards">
                    <div class="pm_card">
                        <p>Are you <span>a resident of India?</span></p>
                        <button onclick="showPopupForm(event ,'cpms')">Explore CMPS services</button>
                    </div>
 
                    <div class="pm_card">
                        <p>Are you <span>an NRI?</span></p>
                        <button onclick="showPopupForm(event ,'nri')">Explore services for NRIs</button>
                    </div>
                </div>
 
            </section>
 
            <section class="nb_invest_opt">
 
                <div class="nb_corporate_partners_slider">
                    <div class="carousel" id="carousel-2">
                        <div class="slides">
                            <div class="slide active" id="slide-0">
                                <picture>
                                    <source media="(max-width: 660px)" srcset="
                                  https://www.nobroker.in/prophub/wp-content/uploads/2024/06/hero1.png
                                " />
 
                                    <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/hero1.png"
                                        alt="Slide 1" width="100%" />
                                </picture>
                            </div>
                            <div class="slide" id="slide-1">
                                <picture>
                                    <source media="(max-width: 660px)" srcset="
                                  https://www.nobroker.in/prophub/wp-content/uploads/2024/06/hero2.png
                                " />
 
                                    <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/hero2.png"
                                        alt="Slide 2" width="100%" />
                                </picture>
                            </div>
                            <div class="slide" id="slide-2">
                                <picture>
                                    <source media="(max-width: 660px)" srcset="
                                  https://www.nobroker.in/prophub/wp-content/uploads/2024/06/hero3.png
                                " />
 
                                    <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/hero3.png"
                                        alt="Slide 2" width="100%" />
                                </picture>
                            </div>
                        </div>
 
                        <div class="radio-buttons">
                            <div class="radio-button active" onclick="goToSlide(0)"></div>
                            <div class="radio-button" onclick="goToSlide(1)"></div>
                            <div class="radio-button" onclick="goToSlide(2)"></div>
                        </div>
                    </div>
                </div>
 
                <div class="options">
                    <h2>Top Investment Options</h2>
                    <div class="opt_cards">
                        <div class="opt_crd">
                            <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Ellipse-32554.png"
                                width="63" height="63" />
                            Auction Properties
                        </div>
 
                        <div class="opt_crd">
                            <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Ellipse-32554-1.png"
                                width="63" height="63" />
                            New Properties
                        </div>
 
                        <div class="opt_crd">
                            <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Ellipse-32554-2.png"
                                width="63" height="63" />
                            Resale Properties
                        </div>
                    </div>
                    <button class="partners_button" onclick="showPopupForm(event ,'Invest')">Explore now</button>
                </div>
            </section>
 
 
            <!-- faqs -->
            <section class="nb_corporate_faqs" id="faq_id">
                <h2 class="section_heading">Frequently Asked Questions</h2>
 
                <div class="nb_faq">
                    <div class="accordian">
                        <div class="question">
                            <h3>
                                What are the Different Types of Rental Agreements in
                                Bangalore?
                            </h3>
                            <i class="icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title></title>
                                        <g id="Complete">
                                            <g data-name="add" id="add-2">
                                                <g>
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="19"
                                                        y2="5"></line>
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="5" x2="19" y1="12"
                                                        y2="12"></line>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </i>
                        </div>
                        <div class="answer">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Consequuntur, ipsa atque! Delectus ducimus quisquam fugit
                                accusamus, ipsa sequi ex soluta laborum perspiciatis, porro
                                quae saepe?
                            </p>
                        </div>
                    </div>
 
                    <div class="accordian">
                        <div class="question">
                            <h3>
                                What are the Different Types of Rental Agreements in
                                Bangalore?
                            </h3>
                            <i class="icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title></title>
                                        <g id="Complete">
                                            <g data-name="add" id="add-2">
                                                <g>
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="19"
                                                        y2="5"></line>
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="5" x2="19" y1="12"
                                                        y2="12"></line>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </i>
                        </div>
                        <div class="answer">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Consequuntur, ipsa atque! Delectus ducimus quisquam fugit
                                accusamus, ipsa sequi ex soluta laborum perspiciatis, porro
                                quae saepe?
                            </p>
                        </div>
                    </div>
 
                    <div class="accordian">
                        <div class="question">
                            <h3>
                                What are the Different Types of Rental Agreements in
                                Bangalore?
                            </h3>
                            <i class="icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title></title>
                                        <g id="Complete">
                                            <g data-name="add" id="add-2">
                                                <g>
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="19"
                                                        y2="5"></line>
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="5" x2="19" y1="12"
                                                        y2="12"></line>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </i>
                        </div>
                        <div class="answer">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Consequuntur, ipsa atque! Delectus ducimus quisquam fugit
                                accusamus, ipsa sequi ex soluta laborum perspiciatis, porro
                                quae saepe?
                            </p>
                        </div>
                    </div>
 
                    <div class="accordian">
                        <div class="question">
                            <h3>
                                What are the Different Types of Rental Agreements in
                                Bangalore?
                            </h3>
                            <i class="icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title></title>
                                        <g id="Complete">
                                            <g data-name="add" id="add-2">
                                                <g>
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="19"
                                                        y2="5"></line>
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="5" x2="19" y1="12"
                                                        y2="12"></line>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </i>
                        </div>
                        <div class="answer">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Consequuntur, ipsa atque! Delectus ducimus quisquam fugit
                                accusamus, ipsa sequi ex soluta laborum perspiciatis, porro
                                quae saepe?
                            </p>
                        </div>
                    </div>
 
                    <div class="accordian">
                        <div class="question">
                            <h3>
                                What are the Different Types of Rental Agreements in
                                Bangalore?
                            </h3>
                            <i class="icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title></title>
                                        <g id="Complete">
                                            <g data-name="add" id="add-2">
                                                <g>
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="19"
                                                        y2="5"></line>
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="5" x2="19" y1="12"
                                                        y2="12"></line>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </i>
                        </div>
 
                        <div class="answer">
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Consequuntur, ipsa atque! Delectus ducimus quisquam fugit
                                accusamus, ipsa sequi ex soluta laborum perspiciatis, porro
                                quae saepe?
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
 
    <script>
 
        // faqs
        const accordians = document.querySelectorAll(".accordian");
 
        accordians.forEach((accordian) => {
            const icons = accordian.querySelector(".icon");
            const answer = accordian.querySelector(".answer");
            const question = accordian.querySelector(".question");
 
            question.addEventListener("click", () => {
                if (icons.classList.contains("toggle")) {
                    icons.classList.remove("toggle");
                    answer.style.maxHeight = null;
                    question.style.color = "#363636";
                } else {
                    icons.classList.add("toggle");
                    answer.style.maxHeight = answer.scrollHeight + "px";
                    question.style.color = "#5F6BBF";
                }
            });
        });
        // slides
 
        function createCarousel(carouselId) {
            let currentIndex = 0;
            const carousel = document.getElementById(carouselId);
 
            function goToSlide(index) {
                currentIndex = index;
                updateSlides();
                updateRadioButtons();
            }
 
            function updateSlides() {
                const slides = carousel.querySelectorAll(".slide");
                slides.forEach((slide, index) => {
                    if (index === currentIndex) {
                        slide.classList.add("active");
                    } else {
                        slide.classList.remove("active");
                    }
                });
            }
 
            function updateRadioButtons() {
                const radioButtons = carousel.querySelectorAll(".radio-button");
                radioButtons.forEach((button, index) => {
                    if (index === currentIndex) {
                        button.classList.add("active");
                    } else {
                        button.classList.remove("active");
                    }
                });
            }
 
            function moveToNext() {
                currentIndex = (currentIndex + 1) % carousel.querySelectorAll(".slide").length;
                updateSlides();
                updateRadioButtons();
            }
 
            setInterval(moveToNext, 3000);
 
            // Initialize the first slide and radio button
            updateSlides();
            updateRadioButtons();
 
            // Expose the goToSlide function for use in onclick attributes
            return { goToSlide };
        }
 
        // Initialize carousels
        const carousel1 = createCarousel("carousel-1");
        const carousel2 = createCarousel("carousel-2");
        const carousel3 = createCarousel("carousel-3");
 
        // Update the goToSlide functions in the HTML to use the created carousels
        window.goToSlide = function (index, carouselId) {
            if (carouselId === 'carousel-1') {
                carousel1.goToSlide(index);
            } else if (carouselId === 'carousel-2') {
                carousel2.goToSlide(index);
            } else if (carouselId === 'carousel-3') {
                carousel3.goToSlide(index);
            }
        };
 
 
 
 
        // submit form
 
 
 
        async function submit_mobile_form(e) {
 
            e.preventDefault();
 
 
 
 
 
            let nameInput = document.getElementById('corporate_partners_input_name_id');
            let emailInput = document.getElementById('corporate_partners_input_email_id');
            let phoneInput = document.getElementById('corporate_partners_input_phone_id');
            let city = document.getElementById("citySelect_id");
 
            document.getElementById("dateid").value = new Date();
            document.getElementById("url").value = window.location.href;
 
            let submitMsg = document.querySelector('.submitMsg');
            let overlay = document.querySelector('.overlay');
            let serviceSelect = document.querySelector('.serviceSelect');
            let Form = document.getElementById("nb_corporate_partners_MainFormId");
 
            let curl = new URL(window.location.href);
 
 
 
            if (nameInput.value === '') {
                nameInput.focus();
                nameInput.style.border = '1px solid red';
                return;
            }
 
            if (emailInput.value === '') {
                emailInput.focus();
                emailInput.style.border = '1px solid red';
                return;
            }
 
            if (phoneInput.value === '') {
                phoneInput.focus();
                phoneInput.style.border = '1px solid red';
 
                return;
            }
 
 
            let letters = /^[a-zA-Z\s]+$/;
            let numbers = /^(\+\d{1,3}[- ]?)?\d{10}$/;
            let email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
 
            if (!nameInput.value.match(letters)) {
                nameInput.focus();
                nameInput.style.border = '1px solid red';
 
                return;
            }
 
            if (!emailInput.value.match(email)) {
                emailInput.focus();
                emailInput.style.border = '1px solid red';
 
                return;
            }
 
            if (!phoneInput.value.match(numbers)) {
                phoneInput.focus();
                phoneInput.style.border = '1px solid red';
 
                return;
            }
            overlay.style.display = "block";
            serviceSelect.style.top = '50%';
			 document.querySelector('.overlay').removeEventListener('click', closePopupForm);
        }
 
 
        // on click select
 
        const categOptions = document.querySelectorAll('.categ_options');
        let isAnySelected = false;
 
        // Add click event listener to each option
        categOptions.forEach(option => {
            option.addEventListener('click', function () {
                this.classList.toggle('selected');
                updateSelectionStatus();
            });
        });
 
 
 
 
        // Function to update the selection status
        function updateSelectionStatus() {
            isAnySelected = Array.from(categOptions).some(option => option.classList.contains('selected'));
        }
 
 
        async function submit_form(e) {
 
            e.preventDefault();
 
            let formUrl = 'https://script.google.com/macros/s/AKfycbwJqCt5NjvFpuvbe-CGsHFmCGS5NOfgr31EIYginxSVz9g1XPnfactHqUUajIQx3YOD/exec';
 
            let nameInput = document.getElementById('corporate_partners_input_name_id');
            let emailInput = document.getElementById('corporate_partners_input_email_id');
            let phoneInput = document.getElementById('corporate_partners_input_phone_id');
            let city = document.getElementById("citySelect_id");
 
            let submitMsg = document.querySelector('.submitMsg');
            let overlay = document.querySelector('.overlay');
            let serviceSelect = document.querySelector('.serviceSelect');
            let Form = document.getElementById("nb_corporate_partners_MainFormId");
 
            let loader = document.querySelector('.loader');
 
 
            if (!isAnySelected) {
                alert('Please select at least one category option.');
                event.preventDefault();
                return;
            } else {
                loader.style.display = 'flex';
 
                const selectedOptions = Array.from(categOptions)
                    .filter(option => option.classList.contains('selected'))
                    .map(option => option.textContent.trim());
 
 
 
 
                let categoriesOptionClass = document.querySelector('.categoriesOptionClass');
                categoriesOptionClass.value = selectedOptions;
 
                updateSelectionStatus();
 
                categOptions.forEach(option => {
                    option.classList.remove('selected');
                });
 
            }
 
 
            let curl = new URL(window.location.href);
            try {
 
                let res = await fetch(formUrl, {
 
                    method: "POST",
                    body: new FormData(Form)
                })
 
                console.log(res);
                if (res.status == 200) {
                    loader.style.display = 'none';
                    serviceSelect.style.top = '-100%';
                    Form.reset();
                    submitMsg.classList.add("submitted");
                    overlay.style.display = "block";
 
                    nameInput.style.border = '1px solid #aaaaaa';
                    phoneInput.style.border = '1px solid #aaaaaa';
                    emailInput.style.border = '1px solid #aaaaaa';
                    Currentcity.style.border = "1px solid #aaaaaa";
                    DestinationCity.style.border = "1px solid #aaaaaa";
 
 
 
                }
 
            } catch (error) {
 
            }
 
 
            setTimeout(() => {
 
                submitMsg.classList.remove("submitted");
                overlay.style.display = "none";
				document.querySelector('.overlay').addEventListener('click', closePopupForm);
            }, 6000)
        }
 
 
 
        async function showPopupForm(e, cat) {
            closeAllForms(); // Close any open forms before showing a new one
 
            let form1 = document.querySelector(".service_forms");
            let form2 = document.querySelector(".service_forms_2");
 
 
            let overlay = document.querySelector('.overlay');
 
            // Clear previous content
            let serviceDetails1 = document.querySelector(".service_forms .service_details");
            let serviceDetails2 = document.querySelector(".service_forms_2 .service_details");
 
            let serviceFormContainer1 = document.querySelector(".service_forms .service_form_container");
            let serviceFormContainer2 = document.querySelector(".service_forms_2 .service_form_container");
 
            let serviceList1 = document.querySelector(".service_forms .service_list");
            let serviceList2 = document.querySelector(".service_forms_2 .service_list-2");
 
            let serviceOffers1 = document.querySelector(".service_forms .service_discount p span");
            let serviceOffers2 = document.querySelector(".service_forms_2 .service_discount p span");
 
            let selectOpt = document.querySelector('.service_forms_2 .service_form_container select');
 
            serviceFormContainer1.querySelector('h2').textContent = "Service Form";
            serviceDetails1.querySelector('h2').textContent = "Service Details";
            serviceList1.innerHTML = '';
 
            serviceFormContainer2.querySelector('h2').textContent = "Service Form";
            serviceDetails2.querySelector('h2').textContent = "Service Details";
            serviceList2.innerHTML = '';
 
            let resetform1 = document.getElementById('nb_service_MainFormId');
            let nameInput1 = document.getElementById('service_input_name_id');
            let emailInput1 = document.getElementById('service_input_email_id');
            let phoneInput1 = document.getElementById('service_input_phone_id');
            nameInput1.style.border = '1px solid #aaaaaa';
            phoneInput1.style.border = '1px solid #aaaaaa';
            emailInput1.style.border = '1px solid #aaaaaa';
            resetform1.reset();
 
            let resetform2 = document.getElementById('nb_service_MainFormId2');
            let nameInput2 = document.getElementById('service_input_name_id2');
            let emailInput2 = document.getElementById('service_input_email_id2');
            let phoneInput2 = document.getElementById('service_input_phone_id2');
            nameInput2.style.border = '1px solid #aaaaaa';
            phoneInput2.style.border = '1px solid #aaaaaa';
            emailInput2.style.border = '1px solid #aaaaaa';
            resetform2.reset();
 
 
            let catInput1 = document.querySelector('.service_forms .categoriesOptionClass');
            let catInput2 = document.querySelector('.service_forms_2 .categoriesOptionClass');
 
 
 
 
            let existingSelect2 = document.querySelector('.service_forms select[name="relocation_type"]');
            let existingSelect3 = document.querySelector('.service_forms select[name="City"]');
 
            if (existingSelect2) {
                existingSelect2.remove();
            }
            if (existingSelect3) {
                existingSelect3.remove();
            }
 
            let existingSelect = document.querySelector('.service_forms_2 select[name="budget"]');
            if (existingSelect) {
                existingSelect.remove();
            }
 
 
 
            if (cat === "AC Servicing") {
                let dataOfACServicing = {
                    headingOfForm: "AC Servicing Form",
                    list: ["AC Service", "AC Repair", "AC Gas Charging", "AC Installation/ Uninstallation"],
                    images: ['https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004284.svg', 'https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004287.svg', 'https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004285.svg', 'https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004286.svg'],
                    offers: "30%",
                    services: ["AC Servicing"],
                    serviceValues: ["HS_SERVICEREPAIR_LEAD"]
                };
 
                serviceFormContainer1.querySelector('h2').textContent = dataOfACServicing.headingOfForm;
                serviceDetails1.querySelector('h2').textContent = dataOfACServicing.headingOfForm;
                serviceOffers1.textContent = dataOfACServicing.offers;
 
                dataOfACServicing.list.forEach((data, index) => {
                    let image = dataOfACServicing.images[index];
                    serviceList1.innerHTML += `
               <li>
                    <img src="${image}" alt="icon" width='46' height='46'>
                    ${data}
                </li>
            `;
                });
 
                let serviceSelect = document.getElementById('Service_Select');
                serviceSelect.innerHTML = ''; // Clear existing options
 
                dataOfACServicing.services.forEach((service, index) => {
                    let option = document.createElement('option');
                    option.value = dataOfACServicing.serviceValues[index];
                    option.textContent = service;
                    serviceSelect.appendChild(option);
                });
 
                selectOpt.style.display = 'block';
 
                let source_city = document.getElementById('source_city');
                if (source_city) {
                    source_city.style.display = 'none';
                }
 
                catInput1.value = cat;
                form1.style.top = "50%";
 
            } else if (cat === "Painting") {
                let dataOfPainting = {
                    headingOfForm: "Home Painting",
                    list: ["Choose from 2200+ shades", "Variety of 500+ textures", "On-time completion", "1-year warranty"],
                    images: ['https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004284-1.png', 'https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004285-1.png', 'https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004287-1.png', 'https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004287-1-1.png'],
                    offers: "30%",
                    services: ["Painting"],
                    serviceValues: ["HS_PAINTING_LEAD"]
                };
 
                serviceFormContainer1.querySelector('h2').textContent = dataOfPainting.headingOfForm;
                serviceDetails1.querySelector('h2').textContent = dataOfPainting.headingOfForm;
                serviceOffers1.textContent = dataOfPainting.offers;
 
                dataOfPainting.list.forEach((data, index) => {
                    let image = dataOfPainting.images[index];
                    serviceList1.innerHTML += `
               <li>
                    <img src="${image}" alt="icon" width='46' height='46'>
                    ${data}
                </li>
            `;
                });
 
                let serviceSelect = document.getElementById('Service_Select');
                serviceSelect.innerHTML = ''; // Clear existing options
 
                dataOfPainting.services.forEach((service, index) => {
                    let option = document.createElement('option');
                    option.value = dataOfPainting.serviceValues[index];
                    option.textContent = service;
                    serviceSelect.appendChild(option);
                });
 
                selectOpt.style.display = 'block';
 
 
                let source_city = document.getElementById('source_city');
                if (source_city) {
                    source_city.style.display = 'none';
                }
 
                catInput1.value = cat;
                form1.style.top = "50%";
 
            } else if (cat === "Packers & Mover") {
                let dataOfPnm = {
                    headingOfForm: "Packers and Movers",
                    list: ["Dedicated Move Manager", "Multi-layer Packaging", "Flexible Rescheduling", "Lowest Price Guarantee"],
                    images: ['https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004284.png', 'https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004287.png', 'https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004285.png', 'https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004286.png'],
                    offers: "30%",
                    services: ["Packers & Mover"],
                    serviceValues: ["Packers & Mover"],
                    cities: ["Bangalore", "Mumbai", "Pune", "Gurgaon", "Chennai", "Hyderbad", "Faridabad", "Delhi", "Noida", "Gazidabad", "Kolkata", "Surat", "Indore", "Jaipur", "Coimbatore", "Ahemadabad"],
                };
 
                serviceFormContainer1.querySelector('h2').textContent = dataOfPnm.headingOfForm;
                serviceDetails1.querySelector('h2').textContent = dataOfPnm.headingOfForm;
                serviceOffers1.textContent = dataOfPnm.offers;
 
                dataOfPnm.list.forEach((data, index) => {
                    let image = dataOfPnm.images[index];
                    serviceList1.innerHTML += `
               <li>
                    <img src="${image}" alt="icon" width='46' height='46'>
                    ${data}
                </li>
            `;
                });
 
                let serviceSelect = document.getElementById('Service_Select');
                serviceSelect.innerHTML = '';
 
                dataOfPnm.services.forEach((service, index) => {
                    let option = document.createElement('option');
                    option.value = dataOfPnm.serviceValues[index];
                    option.textContent = service;
                    serviceSelect.appendChild(option);
                });
 
                let newSelect = document.createElement('select');
                newSelect.name = 'relocation_type';
                newSelect.className = 'service_form_input';
                newSelect.id = 'relocation_type';
                newSelect.required = true;
 
                newSelect.innerHTML = '<option hidden="">Select Option</option> <option value="INTRA_CITY">Intracity</option> <option value="INTER_CITY">Intercity</option>'
 
 
 
                let citySelect = document.createElement('select');
                citySelect.name = 'City';
                citySelect.className = 'service_form_input';
                citySelect.id = 'source_city';
                citySelect.required = true;
 
                citySelect.innerHTML = '<option hidden="">Select City</option>';
                dataOfPnm.cities.forEach((opt) => {
                    citySelect.innerHTML += `<option value="${opt}">${opt}</option>`;
                });
 
                let inputForm = document.querySelector('.service_forms .nb_service_connect_form');
                inputForm.insertBefore(newSelect, inputForm.querySelector('button'));
                inputForm.insertBefore(citySelect, inputForm.querySelector('button'));
 
                selectOpt.style.display = 'block';
 
                catInput1.value = cat;
                form1.style.top = "50%";
 
            }else if (cat === "Cleaning") {

                let dataOfCleaning = {
                    headingOfForm: "Home Cleaning",
                    list: ["Mechanised equipment & safe chemicals", "Trained professionals", "Flexible reschedulingg"],
                    images: ['https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004284-2.png', 'https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004285-2.png', 'https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004287-2.png'],
                    offers: "30%",
                    services: ["Cleaning"],
                    serviceValues: ["HS_CLEANING_LEAD"]
                };

                serviceFormContainer1.querySelector('h2').textContent = dataOfCleaning.headingOfForm;
                serviceDetails1.querySelector('h2').textContent = dataOfCleaning.headingOfForm;
                serviceOffers1.textContent = dataOfCleaning.offers;

                dataOfCleaning.list.forEach((data, index) => {
                    let image = dataOfCleaning.images[index];
                    serviceList1.innerHTML += `
                <li>
                    <img src="${image}" alt="icon" width='46' height='46'>
                    ${data}
                </li>
            `;
                });
 
 
                let serviceSelect = document.getElementById('Service_Select');
                serviceSelect.innerHTML = ''; // Clear existing options
 
                dataOfCleaning.services.forEach((service, index) => {
                    let option = document.createElement('option');
                    option.value = dataOfCleaning.serviceValues[index];
                    option.textContent = service;
                    serviceSelect.appendChild(option);
                });
 
                selectOpt.style.display = 'block';
 
                let source_city = document.getElementById('source_city');
                if (source_city) {
                    source_city.style.display = 'none';
                }
 
                catInput1.value = cat;
                form1.style.top = "50%";
            } else if (cat === "Tenant") {
 
                let dataOfTenant = {
                    headingOfForm: "Tenant Plans",
                    list: ["Premium filters", "Up to 50 owner contacts", "Instant property alerts"],
                    offers: "₹1,499",
                    options: ["Tenant"]
                };
 
                serviceFormContainer2.querySelector('h2').textContent = dataOfTenant.headingOfForm;
                serviceDetails2.querySelector('h2').textContent = dataOfTenant.headingOfForm;
                serviceOffers2.textContent = dataOfTenant.offers;
 
                dataOfTenant.list.forEach((data) => {
                    serviceList2.innerHTML += `
                             <li>
                                 <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004298.png" alt="icon" width='25' height='25'>
                                ${data}
                            </li>
                            `;
 
                });
                selectOpt.innerHTML = '';
 
                dataOfTenant.options.forEach((option) => {
                    selectOpt.innerHTML += `<option value="${option}">${option}</option>`;
                });
 
                selectOpt.style.display = 'block';
 
                catInput2.value = cat;
                form2.style.top = "50%";
            } else if (cat === "Owner") {
 
                let dataOfOwner = {
                    headingOfForm: "Owner Plans",
                    list: ["Up to 60 days plan validity", "Top slot listing for 5x visibility", "Dedicated Relationship Manager"],
                    offers: "₹2,999",
                    options: ["Owner"]
                };
 
                serviceFormContainer2.querySelector('h2').textContent = dataOfOwner.headingOfForm;
                serviceDetails2.querySelector('h2').textContent = dataOfOwner.headingOfForm;
                serviceOffers2.textContent = dataOfOwner.offers;
 
                dataOfOwner.list.forEach((data) => {
                    serviceList2.innerHTML += `
                     <li>
                                 <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004298.png" alt="icon" width='25' height='25'>
                                ${data}
                            </li>
                    `;
                });
                selectOpt.innerHTML = '';
 
                dataOfOwner.options.forEach((option) => {
                    selectOpt.innerHTML += `<option value="${option}">${option}</option>`;
                });
 
                selectOpt.style.display = 'block';
 
                catInput2.value = cat;
                form2.style.top = "50%";
            } else if (cat === "Buyer") {
 
                let dataOfBuyer = {
                    headingOfForm: "Buyer Plans",
                    list: ["Up to 50 seller contacts", "Loan & legal assistance", "On-demand support"],
                    offers: "₹799",
                    options: ["Buyer"]
                };
 
                serviceFormContainer2.querySelector('h2').textContent = dataOfBuyer.headingOfForm;
                serviceDetails2.querySelector('h2').textContent = dataOfBuyer.headingOfForm;
                serviceOffers2.textContent = dataOfBuyer.offers;
 
                dataOfBuyer.list.forEach((data) => {
                    serviceList2.innerHTML += `
                        <li>
                                 <img src="https://www.nobroker.in/prophub/wp-content/uploads/2024/06/Group-1000004298.png" alt="icon" width='25' height='25'>
                                ${data}
                            </li>
                        `;
                });
 
                selectOpt.innerHTML = '';
 
                dataOfBuyer.options.forEach((option) => {
                    selectOpt.innerHTML += `<option value="${option}">${option}</option>`;
                });
 
                selectOpt.style.display = 'block';
 
                catInput2.value = cat;
                form2.style.top = "50%";
            } else if (cat === "cpms") {
 
                let dataOfCpms = {
                    headingOfForm: "CPMS",
                    list: ["Get genuine house Buyer contacts matching your requirements"],
                    offers: "₹799",
                    options: ["Comprehensive Property Management Service"]
                };
 
                serviceFormContainer2.querySelector('h2').textContent = dataOfCpms.headingOfForm;
                serviceDetails2.querySelector('h2').textContent = dataOfCpms.headingOfForm;
                serviceOffers2.textContent = dataOfCpms.offers;
 
                dataOfCpms.list.forEach((data) => {
                    serviceList2.innerHTML += `
                        <li>
                            ${data}
                        </li>
                        `;
                });
 
                selectOpt.innerHTML = '';
 
                dataOfCpms.options.forEach((option) => {
                    selectOpt.innerHTML += `<option value="${option}">${option}</option>`;
                });
 
                selectOpt.style.display = 'block';
 
                catInput2.value = cat;
                form2.style.top = "50%";
            } else if (cat === "nri") {
 
                let dataOfNri = {
                    headingOfForm: "NRI",
                    list: ["Get genuine house Buyer contacts matching your requirements"],
                    offers: "₹799",
                    options: ["NRI Services", "Owner Plans", "Tenant Plans"]
                };
 
                serviceFormContainer2.querySelector('h2').textContent = dataOfNri.headingOfForm;
                serviceDetails2.querySelector('h2').textContent = dataOfNri.headingOfForm;
                serviceOffers2.textContent = dataOfNri.offers;
 
                dataOfNri.list.forEach((data) => {
                    serviceList2.innerHTML += `
                        <li>
                            ${data}
                        </li>
                        `;
                });
 
                selectOpt.innerHTML = '';
 
                dataOfNri.options.forEach((option) => {
                    selectOpt.innerHTML += `<option value="${option}">${option}</option>`;
                });
 
                selectOpt.style.display = 'block';
 
                catInput2.value = cat;
                form2.style.top = "50%";
            } else if (cat === "Invest") {
 
                let dataOfInvest = {
                    headingOfForm: "Invest",
                    list: ["Get genuine house Buyer contacts matching your requirements"],
                    offers: "₹799",
                    cities: ["Mumbai", "Pune", "Bangalore", "Hyderbad", "Delhi", "Noida", "Greater Noida", "Gurgaon", "Chennai", "Other City"],
                    additionalOptions: ["Below 50 Lacs", "50 Lacs - 1 Cr", "1 Cr - 2 Cr", "2+ Cr"]
                };
 
                serviceFormContainer2.querySelector('h2').textContent = dataOfInvest.headingOfForm;
                serviceDetails2.querySelector('h2').textContent = dataOfInvest.headingOfForm;
                serviceOffers2.textContent = dataOfInvest.offers;
 
                dataOfInvest.list.forEach((data) => {
                    serviceList2.innerHTML += `
                        <li>
                            ${data}
                        </li>
                        `;
                });
 
                selectOpt.innerHTML = '<option hidden="">Interested City</option>';
 
                dataOfInvest.cities.forEach((option) => {
                    selectOpt.innerHTML += `<option value="${option}">${option}</option>`;
                });
 
                let newSelect = document.createElement('select');
                newSelect.name = 'budget';
                newSelect.id = 'Budget_Id'
                newSelect.className = 'service_form_input';
                newSelect.required = true;
 
                newSelect.innerHTML = '<option hidden="">Budget</option>';
                dataOfInvest.additionalOptions.forEach((opt) => {
                    newSelect.innerHTML += `<option value="${opt}">${opt}</option>`;
                });
 
                let inputForm = document.querySelector('.service_forms_2 .nb_service_connect_form');
                inputForm.insertBefore(newSelect, inputForm.querySelector('button'));
 
                catInput2.value = cat;
                form2.style.top = "50%";
            }
 
            document.querySelector('.service_forms #Service_Select').addEventListener('change', function () {
                toggleDynamicFields(this.value);
            });
 
 
 
            overlay.style.display = 'block';
        }
 
 
        // Function to toggle visibility of dynamic fields
        function toggleDynamicFields(selectedValue) {
            const form = document.querySelector('.service_forms .nb_service_connect_form');
            const relocationType = document.createElement('select');
            relocationType.id = 'relocation_type';
            relocationType.name = 'relocation_type';
            relocationType.className = 'service_form_input';
            relocationType.required = true;
            relocationType.innerHTML = `
        <option hidden="">Select Option</option>
        <option value="INTRA_CITY">Intracity</option>
       <option value="INTER_CITY">Intercity</option>
    `;
 
            const sourceCity = document.createElement('select');
            sourceCity.id = 'source_city';
            sourceCity.name = 'source_city';
            sourceCity.className = 'service_form_input';
            sourceCity.required = true;
            sourceCity.innerHTML = `
        <option hidden="">Select City</option><option value="Bangalore">Bangalore</option><option value="Mumbai">Mumbai</option><option value="Pune">Pune</option><option value="Gurgaon">Gurgaon</option><option value="Chennai">Chennai</option><option value="Hyderbad">Hyderbad</option><option value="Faridabad">Faridabad</option><option value="Delhi">Delhi</option><option value="Noida">Noida</option><option value="Gazidabad">Gazidabad</option><option value="Kolkata">Kolkata</option><option value="Surat">Surat</option><option value="Indore">Indore</option><option value="Jaipur">Jaipur</option><option value="Coimbatore">Coimbatore</option><option value="Ahemadabad">Ahemadabad</option></select>
    `;
 
            // Remove existing dynamic fields if they exist
            const existingRelocationType = document.getElementById('relocation_type');
            const existingSourceCity = document.getElementById('source_city');
            if (existingRelocationType) existingRelocationType.remove();
            if (existingSourceCity) existingSourceCity.remove();
 
            // Append dynamic fields if "Packers & Mover" is selected
            if (selectedValue === "Packers & Mover") {
                form.insertBefore(relocationType, form.querySelector('button'));
                form.insertBefore(sourceCity, form.querySelector('button'));
            }
        };
 
        function closeAllForms() {
            let forms = document.querySelectorAll(".service_forms, .service_forms_2");
            let overlay = document.querySelector('.overlay');
 
            forms.forEach(form => {
                form.style.top = "-100%";
            });
 
            overlay.style.display = 'none';
        }
 
        function closePopupForm() {
            closeAllForms();
        }
 
        document.querySelector('.overlay').addEventListener('click', closePopupForm);
 
        // service form authentication
 
        async function submit_service_form(e) {
 
            e.preventDefault();
 
 
 
            let formUrl = 'https://script.google.com/macros/s/AKfycbz_Dt7lLs5kUp76PLA7h2Izgnus9EMP-R-rgLObnMPiiObiuHVS6DrOWNRLgm7a4NiD/exec'
            let nameInput = document.getElementById('service_input_name_id');
            let emailInput = document.getElementById('service_input_email_id');
            let phoneInput = document.getElementById('service_input_phone_id');
            document.getElementById("dateid1").value = new Date();
            document.getElementById("url1").value = window.location.href;
            let submitMsg = document.querySelector('.submitMsg');
            let LoaderForMain = document.querySelector('.service_forms .loader');
            let Form = document.getElementById("nb_service_MainFormId");
            let curl = new URL(window.location.href);
            let commercialCleaningCampaign = curl.searchParams.get('utm_campaign');
            let overlay = document.querySelector('.overlay');
            // document.getElementById("serviceService_campaignId").value = commercialCleaningCampaign;
 
            let Service_Select = document.getElementById('Service_Select');
            let relocation_type = document.getElementById('relocation_type');
            let source_city = document.getElementById('source_city');
 
            let form1 = document.querySelector(".service_forms");
 
 
 
 
            if (nameInput.value === '') {
                nameInput.focus();
                nameInput.style.border = '1px solid red';
                return;
            } else {
                nameInput.style.border = '1px solid #aaaaaa';
            }
 
 
            if (emailInput.value === '') {
                emailInput.focus();
                emailInput.style.border = '1px solid red';
                return;
            }
 
            if (phoneInput.value === '') {
                phoneInput.focus();
                phoneInput.style.border = '1px solid red';
 
                return;
            }
 
            let letters = /^[a-zA-Z\s]+$/;
            let numbers = /^(\+\d{1,3}[- ]?)?\d{10}$/;
            let email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
 
            if (!nameInput.value.match(letters)) {
                nameInput.focus();
                nameInput.style.border = '1px solid red';
 
                return;
            }
 
            if (!emailInput.value.match(email)) {
                emailInput.focus();
                emailInput.style.border = '1px solid red';
 
                return;
            }
 
            if (!phoneInput.value.match(numbers)) {
                phoneInput.focus();
                phoneInput.style.border = '1px solid red';
 
                return;
            }
            LoaderForMain.style.display = 'flex';
 
 
 
            // api for pnm
            let catInput1 = document.querySelector('.service_forms .categoriesOptionClass');
 
            if (catInput1.value == 'Packers & Mover') {
                (async () => {
                    let response_api_pnm = await fetch('https://hs.nobroker.in/api/v1/pnm/unsecure/public/add', {
                        method: 'POST',
                        headers: {
 
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams({
 
 
                            "userName": nameInput.value,
                            "userPhone": phoneInput.value,
                            "email": emailInput.value,
                            "userId": '',
                            "sourceCity": source_city.value,
                            "destinationCity": '',
                            "movementDate": '',
                            "relocationType": relocation_type.value,
                            "source": "Corporate Leads",
                            "comment": '',
                            "userEmail": '',
                            "stage": "LEAD_CREATED"
 
                        })
                    });
 
                })();
 
            } else if (catInput1.value == 'AC Servicing' || catInput1.value == 'Cleaning' || catInput1.value == 'Painting') {
 
                (async () => {
                    let response_api = await fetch('https://hs.nobroker.in/admin/leads/homeservices/lead', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(
                            {
                                "source": "CORPORATE_LEAD",
                                "name": nameInput.value,
                                "phone": phoneInput.value,
                                "email": emailInput.value,
                                "serviceType": Service_Select.value
                            }
 
                        )
                    });
 
                    let dataResponse_api = await response_api.json();
                    if (response_api["status"] == 200) {
                        console.log(response_api);
                        console.log(dataResponse_api);
                    }
 
 
                })();
            }
 
            try {
 
                let res = await fetch(formUrl, {
 
                    method: "POST",
                    body: new FormData(Form)
                })
                if (res.status === 200) {
                    form1.style.top = '-100%'
                    LoaderForMain.style.display = 'none';
                    Form.reset();
                    submitMsg.classList.add("submitted");
                    overlay.style.display = "block";
					 document.querySelector('.overlay').removeEventListener('click', closePopupForm);
                }
 
            } catch (error) {
 
            }
 
 
            setTimeout(() => {
 
                submitMsg.classList.remove("submitted");
                overlay.style.display = "none";
				 document.querySelector('.overlay').addEventListener('click', closePopupForm);
            }, 6000)
        }
 
        // second form 
        async function submit_service_form2(e) {
 
            e.preventDefault();
 
 
 
            let formUrl = 'https://script.google.com/macros/s/AKfycbyl7l3XZw30ezqYrmBWI0sg4cBwse4c9h2osD7ET7VoysXOAVRN7G4r2FaS4MMSUOR7/exec'
            let nameInput = document.getElementById('service_input_name_id2');
            let emailInput = document.getElementById('service_input_email_id2');
            let phoneInput = document.getElementById('service_input_phone_id2');
            document.getElementById("dateid2").value = new Date();
            document.getElementById("url2").value = window.location.href;
            let submitMsg = document.querySelector('.submitMsg');
            let LoaderForMain = document.querySelector('.service_forms_2 .loader');
            let Form = document.getElementById("nb_service_MainFormId2");
            let curl = new URL(window.location.href);
            let commercialCleaningCampaign = curl.searchParams.get('utm_campaign');
            let overlay = document.querySelector('.overlay');
            // document.getElementById("serviceService_campaignId").value = commercialCleaningCampaign;
 
            let form1 = document.querySelector(".service_forms_2");
            let CitInput = document.getElementById('Service_Select2');
            let Budget_Id = document.getElementById('Budget_Id');
 
 
            if (nameInput.value === '') {
                nameInput.focus();
                nameInput.style.border = '1px solid red';
                return;
            } else {
                nameInput.style.border = '1px solid #aaaaaa';
            }
 
 
            if (emailInput.value === '') {
                emailInput.focus();
                emailInput.style.border = '1px solid red';
                return;
            } else {
                nameInput.style.border = '1px solid #aaaaaa';
            }
 
            if (phoneInput.value === '') {
                phoneInput.focus();
                phoneInput.style.border = '1px solid red';
 
                return;
            } else {
                nameInput.style.border = '1px solid #aaaaaa';
            }
 
            let letters = /^[a-zA-Z\s]+$/;
            let numbers = /^(\+\d{1,3}[- ]?)?\d{10}$/;
            let email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
 
            if (!nameInput.value.match(letters)) {
                nameInput.focus();
                nameInput.style.border = '1px solid red';
 
                return;
            }
 
            if (!emailInput.value.match(email)) {
                emailInput.focus();
                emailInput.style.border = '1px solid red';
 
                return;
            }
 
            if (!phoneInput.value.match(numbers)) {
                phoneInput.focus();
                phoneInput.style.border = '1px solid red';
 
                return;
            }
            LoaderForMain.style.display = 'flex';
 
            // api for builders
            let catInput2 = document.querySelector('.service_forms_2 .categoriesOptionClass');
 
            if (catInput2.value == 'Invest') {
 
                let apiUrl = 'https://builder-crm.nobroker.in/api/v1/builder/leads/external/add-lead';
 
                let response_api = await fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Cookie': '_ud_check=true; mbTrackID=f2b0c400f6d243e6a18e5ed2ac92f019; nbDevice=desktop'
                    },
                    body: JSON.stringify({
                        'contactName': nameInput.value,
                        'contactEmail': emailInput.value,
                        'contactPhone': phoneInput.value,
                        'contactCitInput': CitInput.value,
                        'buildingId': "8a9f02838a3b352a018a3bf70e9d237c",
                        'source': 'INSTA_PAGE',
                        'budget': Budget_Id.value,
                        'sourceType': "CORPORATE_LEAD"
 
                    })
                });
 
 
 
            }
 
            try {
 
                let res = await fetch(formUrl, {
 
                    method: "POST",
                    body: new FormData(Form)
                })
                if (res.status === 200) {
                    form1.style.top = '-100%'
                    LoaderForMain.style.display = 'none';
                    Form.reset();
                    submitMsg.classList.add("submitted");
                    overlay.style.display = "block";
					 document.querySelector('.overlay').removeEventListener('click', closePopupForm);
                }
 
            } catch (error) {
 
            }
 
 
            setTimeout(() => {
 
                submitMsg.classList.remove("submitted");
                overlay.style.display = "none";
				 document.querySelector('.overlay').addEventListener('click', closePopupForm);
            }, 6000)
        }
 
 
 
        // url
 
 
        document.getElementById("otherLogo").src="<?php echo $matching_event->Logo; ?>";
 
		 if ("<?php echo $matching_event->Logo; ?>" === "https://www.nobroker.in/prophub/wp-content/uploads/2024/06/AU-logo-01.png") {
   			let mainLogo = document.getElementById("mainLogo");
			 let employee = document.getElementById('employee');
			 let submitMsg = document.querySelector('.submitMsg h2');
			 let contact = document.getElementById('contact_num');
			mainLogo.src = "https://assets.nobroker.in/static/img/logos/nb_logo_new_trans.svg";
			 mainLogo.width = 170;
			 mainLogo.height = 45;
			 employee.innerText  = 'Customer!';
			 submitMsg.innerText = 'Congratulations AU Bank Customer, You have unlocked special discounts!';
			 contact.innerText = 'Contact Your Key-Account Manager 8306997513'
}
 if ("<?php echo $matching_event->Logo; ?>" === "https://www.nobroker.in/prophub/wp-content/uploads/2024/06/clear-from-CT-black-1.png") {
	  let employee = document.getElementById('employee');

	   employee.innerText  = 'Customers!';
 }
		
 
    </script>
</body>
 
</html>
