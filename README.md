# Student Grade Calculator (MySQL)

A PHP page that reads student scores from a MySQL table, calculates each student's end-of-term grade, letter grade and grade point, and shows whether they passed. It is the database version of my [JSON-based grade calculator](https://github.com/manyaksisko35/json_ile_ogrenci_durumu); the calculation runs in PHP when the page loads and nothing is written back to the database.

## Features

- Reads all rows from the `ogrenciler` table using `mysqli` (UTF-8 / utf8mb4 connection).
- Calculates the end-of-term grade with these weights:

  | Component         | Weight |
  |-------------------|--------|
  | Midterm (`vize`)  | 25%    |
  | Homework (`odev`) | 25%    |
  | Project (`proje`) | 5%     |
  | Final (`final`)   | 45%    |

- Rounds the result to two decimals and converts it to a letter grade and grade point:

  | Average (at least) | Letter | Point | Status    |
  |--------------------|--------|-------|-----------|
  | 90                 | AA     | 4.00  | Başarılı  |
  | 85                 | BA     | 3.50  | Başarılı  |
  | 80                 | BB     | 3.00  | Başarılı  |
  | 75                 | CB     | 2.50  | Başarılı  |
  | 70                 | CC     | 2.00  | Başarılı  |
  | 65                 | DC     | 1.50  | Başarılı  |
  | 60                 | DD     | 1.00  | Başarılı  |
  | 50                 | FD     | 0.50  | Başarısız |
  | below 50           | FF     | 0.00  | Başarısız |

  (Başarılı = passed, Başarısız = failed)
- Shows the results in an HTML table: name, the four scores, end-of-term grade, letter, grade point and status. Passing rows are green, failing rows are red.
- Values from the database are escaped with `htmlspecialchars` before output.
- Shows a "no students found" message when the table is empty.

## Built with

- PHP (`mysqli`)
- MySQL / MariaDB
- HTML and CSS

## Getting started

### Requirements

- PHP with the `mysqli` extension
- MySQL or MariaDB. The SQL dump was exported from XAMPP (PHP 8.2.12, MariaDB 10.4.32), so XAMPP is the easiest way to run it.

### Setup

1. Copy the project into your web root, for example `C:\xampp\htdocs\database_ile_ogrenci_durumu`.
2. Start Apache and MySQL.
3. Create a database named `okul_mbp_db` and import `okul_mbp_db.sql` into it (phpMyAdmin Import tab, or):

   ```bash
   mysql -u root -p -e "CREATE DATABASE okul_mbp_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci"
   mysql -u root -p okul_mbp_db < okul_mbp_db.sql
   ```

   This creates the `ogrenciler` table with five sample students.
4. Open `db.php` and set the server, username, password and database name for your own MySQL setup. Use your own password and do not commit it. `db.php` spells the database name `okul_MBP_db`; Windows ignores the case difference, but on Linux database names are case-sensitive, so change it to `okul_mbp_db` there.
5. Open `http://localhost/database_ile_ogrenci_durumu/`.

To add students, insert rows into `ogrenciler`:

```sql
INSERT INTO ogrenciler (okul_no, ad_soyad, ders_adi, vize, final, odev, proje)
VALUES ('25006', 'Elif Şahin', 'Web Programlama', 75, 82, 90, 80);
```

## Example

With the sample data from `okul_mbp_db.sql`, the page shows:

| Student       | Midterm | Homework | Project | Final | Average | Letter | Point | Status    |
|---------------|---------|----------|---------|-------|---------|--------|-------|-----------|
| Ali Yılmaz    | 70      | 90       | 85      | 80    | 80.25   | BB     | 3.00  | Başarılı  |
| Ayşe Demir    | 45      | 60       | 70      | 50    | 52.25   | FD     | 0.50  | Başarısız |
| Mehmet Kaya   | 30      | 55       | 50      | 40    | 41.75   | FF     | 0.00  | Başarısız |
| Zeynep Arslan | 90      | 85       | 100     | 95    | 91.5    | AA     | 4.00  | Başarılı  |
| Can Kaya      | 55      | 60       | 50      | 45    | 51.5    | FD     | 0.50  | Başarısız |

## Türkçe

Bu proje, öğrenci notlarını MySQL veritabanından okuyup dönem sonu notunu hesaplayan bir PHP uygulamasıdır. Not; vize %25, ödev %25, proje %5 ve final %45 ağırlıkla hesaplanır, ardından harf notu, katsayı ve Başarılı/Başarısız durumu belirlenir. Çalıştırmak için `okul_mbp_db.sql` dosyasını içe aktarmanız ve `db.php` içindeki bağlantı bilgilerini kendi sunucunuza göre düzenlemeniz yeterlidir.

Made by [Hasan Alp Güngör](https://hasanalpgungor.com/en)
