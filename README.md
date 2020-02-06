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
4. CRUD Generator MVC dari `Harviacode`.
5. Kustomisasi `Harviacode`:
```
    1. Exclude nama tabel `users`, `groups`, `users_groups` dan `menu` pada menu Select Table. 
    2. Set default generator folder pada `./application`.
    3. Tambah fungsi `Is Admin` pada semua file MVC, limitasi hanya bisa diakses oleh group `admin`.
    4. Tambah fungsi `title` dan `description` pada setiap `View` dan `Breadcrumbs`.
    5. Default `VIew` menggunakan `Datatables Bootstrap` template 
```
6. Masih tahap sangat awal dan akan terus diperbarui

## Penutup
Semoga bermanfaat.