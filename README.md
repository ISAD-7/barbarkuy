# CIA
Code Igniter Automation

## Informasi 
PHP Framework CI dengan template dashboard AdminLTE dan sistem acl dari Ion Auth serta custom CRUD Generator.

## Initial - 6/2/2020
1. PHP Framework menggunakan `CodeIgniter`.
2. Dashboard Template menggunakan `AdminLTE`.
3. Access Control Login menggunakan `Ion Auth`.
4. Kostumisasi `Ion Auth`: 
    * CRUD user
    * CRUD group
    * Identity Login by `username` atau `email`.
4. CRUD Generator MVC dari `Harviacode`.
5. Kustomisasi `Harviacode`:
    * Exclude nama tabel `users`, `groups`, `users_groups` dan `menu` pada menu Select Table. 
    * Set default generator folder pada `./application`.
    * Tambah fungsi `Is Admin` pada semua file MVC, limitasi hanya bisa diakses oleh group `admin`.
    * Tambah fungsi `title` dan `description` pada setiap `View` dan `Breadcrumbs`.
    * Default `VIew` menggunakan `Datatables Bootstrap` template 
6. Masih tahap sangat awal dan akan terus diperbarui

## Akses Login
Akses login default : 
* Username : `administrator` atau `sic@stikombinaniaga.ac.id`.
* Password : `password`. 

## Penutup
Semoga bermanfaat.