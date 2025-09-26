<p align='center'>
    <img width="300" height="100" alt="image" src="https://github.com/user-attachments/assets/f5f6178e-022a-49f4-b48a-ad9e160bb506" />
</p>

<p align='center'>
    <img width="100" height="50" alt="image" src="https://github.com/user-attachments/assets/9472bd49-2973-4fb6-a3fe-f54f1d671976" />
</p>

<br>

## About MallHub

Your ultimate mall companion. Browse products, discover sales, and connect with stores—all from your phone. For shoppers, it’s a smarter way to find what you love. For stores, it’s a new way to get noticed.

## Features

-   **Admin Panel**: Admin can manage mall and store data

## Database Schema

<p align='center'>
    <img width="500" height="1000" alt="image" src="https://github.com/user-attachments/assets/ee750301-2df5-4590-a79f-7ef91ec06ba5" />
</p>

## API Usage

### api/products

**Description**
<br>
Display paginated product catalog eager loaded with store and product images data

Required Query:
<br>
None

Acceptable Query:
<br>
-   store_id: Filter product based on the store
-   sub_category_id: Filter product based on the subcategory
-   name: Filter product based on the name

### api/stores

**Description**
<br>
Display paginated store catalog eager loaded with floor data

Required Query:
<br>
None

Acceptable Query:
<br>
-   floor_id: Filter store based on the floor

-   name: Filter store based on the name

### api/floors

**Description**
<br>
Display all floors

Required Query:
<br>
None

Acceptable Query:
<br>
None

### api/categories

**Description**
<br>
Display all product categories

Required Query:
<br>
None

Acceptable Query:
<br>
None

### api/subcategories

**Description**
<br>
Display all product subcategories

Required Query:
<br>
-   category_id

Acceptable Query:
<br>
None
