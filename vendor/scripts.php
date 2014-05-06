<?php 
include_once("db.php");

function generatePassword($length=9, $strength=0) {
    $vowels = 'aeuy';
    $consonants = 'bdghjmnpqrstvz';
    if ($strength & 1) {
        $consonants .= 'BDGHJLMNPQRSTVWXZ';
    }
    if ($strength & 2) {
        $vowels .= "AEUY";
    }
    if ($strength & 4) {
        $consonants .= '23456789';
    }
    if ($strength & 8) {
        $consonants .= '@#$%';
    }
 
    $password = '';
    $alt = time() % 2;
    for ($i = 0; $i < $length; $i++) {
        if ($alt == 1) {
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        } else {
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}

$data = "A1,Papa Chang,chiyenchang@hotmail.ca,
A10,Hsiung Mama,amybear_09@hotmail.com,
A2,Takoyaki Taiyaki Ikayaki,kwongwailun@hotmail.com,
A3,Kashmiri BBQ,kashmiribbq@live.com,
A4,Snack Bar,dina_hihi@hotmail.com,
A5,Colin and Friends,COLIN.YEN@HOTMAIL.Ca,
A6,Seafood Paradise,bckenneth@yahoo.ca,
A7,Tornado Fries,bckenneth@yahoo.ca,
A8,Ten Ren's Tea,tenren.tth@gmail.com,
A9,Feng Mao BBQ,LI1126000@HOTMAIL.COM,
B1,Cha Me Cha - Snow Ice,monica@watercome.ca,
B2,Happy Tummy,JCF999@HOTMAIL.COM,
B3,Cooking Mamas,cooking.mamas@hotmail.com,
B4,Ballers,STEVENPAKFUNG.LAU@MAIL.UTORONTO.CA,
B5,Ice Volcano - Ice Cream,donaldtin@yahoo.com,
B6,Chicken & Juice,HUANJIN.CHEN89@GMAIL.COM,
B7,Sumo Bun,kit0515@gmail.com,
B8,D Asian Sliders,matthew@smokespoutinerie.com,
B9,Diana's Seafood,chris@dianasseafood.com,
C1,Shanghai Stinky Tofu,ZHYLUCY@YAHOO.CA,
C2,Cold Chinese Noodles,dinowq@hotmail.com,
C3,Dat Chick Craze,B2tong84@gmail.com,
C4,Maobo,LOKHIMCHAN@GMAIL.COM,
C6,The Original Taste,gentooking@hotmail.com,
CD1,Canada Dry,wesleylai@primead.com,
D1,Seafood Grill,tonghe_@hotmail.com,
D10,Latte Mei,amyho@sympatico.ca,
D11,EatTO,eriny@eatto.ca,
D2,Mochi King,freda.h.lau@gmail.com,
D3,Sugar Love,carey86.chan@gmail.com,
D4,Cup Cup Dessert,daven.wong@gmail.com,
D5,Malaysian Kitchen,SUB.RAMESH@YAHOO.CA,
D6,Cacas,cjcjmak@hotmail.com,
D7,Peking Duck corn juice sago,cnjiaan@gmail.com,
D8,Fantastic,bonbon520@gmail.com,
D9,Le Wei,ALANLIN2@GMAIL.COM,
E1,Tea Shop 168,seacomteen@hotmail.com,
E10,BBQ Lamb and Squid,hengdely@hotmail.com,
E2,Asian Poutine,nelphu@hotmail.com,
E4,Tacocat,tacocat.to@gmail.com,
E5,Big Meal,agnes619@yahoo.com.hk,
E6,Cold Noodles and Iced Fruit Tea,JAMES.CC.LIU@GMAIL.COM,
E7,Like A Baos,howardhaocheng@gmail.com,
E8,Eggcellent ___,chong.t.thomas@gmail.com,
F1,b,saisouk@hotmail.com,
F2,Shaved Ice,ms_miss1021@hotmail.com,
F3,Okonomiyaki On Fire,cherie.chan.cy@gmail.com,
F4,Happy Twist,HAPPYTWIST@HOTMAIL.COM,
F5,Guo's Food,guo_shu_ca@yahoo.com,
F7,Japadogs,echeng@leapfroghub.com,
F8,Me.n.u,allentan27@gmail.com,
F9,Let's Order,contact.letsorder@gmail.com,
G1,Karmayan,byron.garland@gmail.com,
G2,Watermelon Juice,minchiu67@gmail.com,
G3,Xin Jang Zheng Zong Yang Youchan,pilotxuq@gmail.com,
G4,York Chinese Student Association,info.ycsa@gmail.com,
G5,Wei's Stinky Tofu,kwei0812@rogers.com,
H1,Toronto and York Region Labour Council,jhuang@labourcouncil.ca,
H3,A Squared,aangelaleung001@ mail.com,
H4,Bell,pondobooking@hotmail.ca,
H5,Lip Labz,david@mievents.ca,
H8,You Got Nerve?/Gunman Style,chriskachun@gmail.com,
I10,Paper Net Fishing,kktang1211@gmail.com,
I5,Dim Sum City,jon@bamboostar.com,
I8,Tofu,tung_21@hotmail.com,
J10,Balloonasity,david@mievents.ca,
J2,Mandarin Badminton,badminton@golfmandarin.com,
J4,Game It Up and I Roll,orlandochang@gmail.com,
J6,Royal Bee,info@royalbee.ca,
J7,Skunk Juice Earbud,RICHARDTRIEU1993@HOTMAIL.COM,
J8,ROGERS,felipex2@yahoo.com,
J9,Jewellry,joywei0308@gmail.com,
K1,Naniwa Taro,maxjlz2000@yahoo.co.jp,
K2,Ah Ma's Kitchen,shihlun.jason.chen@gmail.com,
K3,El Perro Heffe,davidpssmith@gmail.com,
K4,Modernist Dessert by Gusta Haus,baron@gusta.ca,
K5,Two Good Dogs,andy.yang@rbc.com,
K6,Juicy Melons,linjnfoundation@gmail.com,
K7,Tiny Two Fresh Fruit Juice,SSHENGLI@HOTMAIL.COM,
K8,What's not to like?,roland9102@gmail.com,
K9,Corn Roasters,samont@sympatico.ca,
L1,Tea-A-Break,william_1023@hotmail.com,
L3,Yo-Yogurt,EJAYZ_777@HOTMAIL.COM,
L4,Mashi!,ANDREWP_84@YAHOO.COM,
L5,Bite Icy Banana,fungmoonstop@gmail.com,
L6,Taste of Tomorrow,CECILIAHYLEUNG@GMAIL.COM,
L7,Bop Bop,ant.nguyen1226@gmail.com,
L8,167 Skewers - Metal,info@167ca.com,
L9,REFRESH! Mobile Cafe Inc.,harrison.luong@gmail.com,
T1,Marble Slab,w.lameiro@sympatico.ca,
T2,Beavertails Mobile GTA,BTMobileGTA@gmail.com,
T3,Chilly Ribbons,MATTHEW@SMOKESPOUTINERIE.COM,
T4,Buster's Sea Cove,tombustersseacove@gmail.com,
T5,Ice Cream Truck,dairybest@rogers.com,
T6,L'l Alfie's Lemonade,info@yeoldfudgepot.ca,
T6,L'l Alfie's Lemonade,angelaleung001@gmail.com,
T6,L'l Alfie's Lemonade,harrison.swift@concessionscanada.ca,
T6,L'l Alfie's Lemonade,xinqing99@hotmail.com"; 
$pattern = "/,/";
$new_array = preg_split($pattern, $data);
$count = 1; 
$_db = new db(); 
$connection = $_db->get_connection();
$saved_csv = "username,password,\r\n";
foreach ($new_array as $key => $value) {
	//echo "count: $count "; 	
	//echo $value;
	if ($count == 3){
		$count = 1 ;
		$password = generatePassword(8,4);
		$password_copy = $password; 
		$password = md5($password);
		$email = strtolower($value);
		$query = "INSERT INTO account_info (username,password) VALUES ('$email','$password')";
		$connection->query($query);
		echo $query."<br/>";
		$saved_csv = $saved_csv.$email.",".$password_copy."\r\n";
	}
	else{
		$count ++ ; 
	}
	//echo " ";
	//$count ++ ; 
}
$file = "test_file.csv";
file_put_contents($file, $saved_csv);
echo $saved_csv;

?>