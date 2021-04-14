<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## 1)-XAMPP kurulumu
[Setup](https://www.apachefriends.org/download.html)
Standart kurulum tamamlandıktan sonra Apache ve MySql Serverı başlatın.

## 2)-Composer Kurulumu
[Detaylı Bilgi](https://getcomposer.org/) için ziyaret edebilirsiniz. <br/>
[Windows Setup](https://getcomposer.org/Composer-Setup.exe) Kurulum dosyasıyla kurulum işlemlerinizi tamamlayabilirsiniz.
* ### Komut Satırından Kurulum
* Yükleyiciyi mevcut dizine indirin.
* * `php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`
* İndirilen yükleyicinin doğrulama işlemlerini gerçekleştirin.
* * `php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"` 
* Yükleyiciyi çalıştırın ve composer kurulumunu başlatın.
* * `php composer-setup.php`
* Yükleyiciyi kaldırın.
* * `php -r "unlink('composer-setup.php');"`    
* Kurulum tamamlandıktan sonra `composer -v ` komutuyla kurmuş oldugumuz composer versiyonunu kontrol edebiliriz.

## 3)-Composer Üzerinden Laravel Kurulumu
* `composer global require laravel/installer ` komutunu çalıştırdıktan sonra proje klasörlerinizin bulunduğu dizini açın. Varsayılan dizin genellikle `cd C:\xampp\htdocs` dir.
* `laravel new example-app ` example-app adında laravel projemizi oluşturduk
* `cd example-app ` komutuyla example-app isimli proje klasörümüze erişim sağlıyoruz.
* `php artisan serve` komutu çalıştırıldığında hata almazsanız laravel projeniz başarılı bir şekilde kurulmuş demektir.

## 4)-Projenin Sisteminize Entegre Edilmesi
1)- Varsayılan `C:\xampp\htdocs` konumunda yada belirlediğiniz proje dizininde zip dosyasını çıkartın. <br/>
2)- Projeniz için yeni bir veri tabanı oluşturun <br/>
3)- Projenizde bulunan `.env` dosyasında 
* **DB_DATABASE =** database_name 
* **DB_USERNAME =** root 
* **DB_PASSWORD =**  <br/>

alanlarını uygun şekilde doldurarak veri tabanı bağlantımızı gerçekleştirelim. Veritabanı kurulumu sırasında herhangibir root şifresi tanımlamadıysanız **DB_PASSWORD** alanını boş bırakınız. <br/>

4)- Veritabanı tablolarını yüklemek için terminal ekranında projenizin bulunduğu dizini açıp
       `php artisan migrate` 
komutunu çalıştırın. Tabloların yüklendiğini kontroletmek için veritabanınızı kontroledebilirsiniz. <br/>

5)- Veritabanına aptal data ekleyip kontrol işlemlerini gerçekleştirmek için
       `php artisan db:seed`  
    komutunu kullanabilirsiniz. <br/>
6)- Veri tabanı tablolarını temizlemek için 
*  `php artisan migrate:reset` 
*  `php artisan migrate`

komutlarını çalıştırabilirsiniz. <br/>
