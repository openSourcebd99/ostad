#### 1. Explain what Laravel's query builder is and how it provides a simple and elegant way to interact with databases.

Ans: 
Laravel's query builder is essentially a user-friendly interface for building and executing database operations. Its purpose is to simplify the process of writing SQL queries and make your database interactions more readable and secure.

Key Features:

1. **Fluent Interface**: The query builder uses a "fluent" interface. This means it lets you chain together multiple functions in a single statement, making your queries easier to read and write.

2. **Security**: Laravel's query builder automatically protects against SQL injection attacks. It does this by sanitizing all inputs to your queries, making sure they are safe to execute on your database.

3. **Support for Multiple Database Systems**: Laravel's query builder isn't tied to a specific database system. It can be used with a variety of database systems like MySQL, PostgreSQL, SQLite, and SQL Server.

4. **Simplicity**: Instead of having to write complex SQL queries, you express what you want in simple PHP syntax. Laravel's query builder takes care of translating it into the appropriate SQL query.

5. **Consistency**: The query builder provides a consistent way to build queries, no matter how complex they are. Whether you're performing a simple SELECT operation or a complex JOIN, the syntax remains straightforward and understandable.

6. **Convenience Methods**: It provides convenience methods for common tasks, like retrieving the first row that matches a condition, or counting the number of rows that match a condition.

7. **Aggregates and Complex Queries**: It also supports aggregate functions (like count, max, min, avg, and sum) and complex queries including joins, unions, and subqueries.

By using Laravel's query builder, you can create more maintainable and secure database interactions with less effort.



#### 2. Write the code to retrieve the "excerpt" and "description" columns from the "posts" table using Laravel's query builder. Store the result in the $posts variable. Print the $posts variable.

Ans: 
```sql
$posts = DB::table('posts')
            ->select('excerpt', 'description')
            ->get();
print_r($posts);
```


#### 3.Describe the purpose of the distinct() method in Laravel's query builder. How is it used in conjunction with the select() method?

Ans: In Laravel's query builder, the distinct() method is used to ensure that the query returns only unique results. In other words, it will eliminate any duplicate rows in the returned data.

You can use distinct() in conjunction with the select() method to specify the columns that you want to get unique values for. This combination can be especially useful when you're interested in getting all unique values of a certain attribute (or multiple attributes) from a table.

Example:
```sql
$uniqueTitles = DB::table('posts')
                    ->select('title')
                    ->distinct()
                    ->get();
```

#### 4. Write the code to retrieve the first record from the "posts" table where the "id" is 2 using Laravel's query builder. Store the result in the $posts variable. Print the "description" column of the $posts variable.

Ans: 
```sql
$posts = DB::table('posts')->where('id', 2)->first();
if($posts) {
  echo $posts->description;
}
```


#### 5. Write the code to retrieve the "description" column from the "posts" table where the "id" is 2 using Laravel's query builder. Store the result in the $posts variable. Print the $posts variable.

Ans:
```sql
$posts = DB::table('posts')
            ->where('id', 2)
            ->value('description');

print_r($posts);
```


#### 6. Explain the difference between the first() and find() methods in Laravel's query builder. How are they used to retrieve single records?

Ans: 

In Laravel's query builder, the `first()` and `find()` methods are used to retrieve single records from the database. They are quite similar, but there are important differences between them:

1. `first()`:
   - This method returns the first record that matches the conditions in the query. If no conditions are provided, it simply returns the first record in the table.
   - It is often used in combination with other query methods like `where()`. For example: `DB::table('users')->where('name', 'John')->first();`
   - If no record is found, `first()` returns `null`.

2. `find()`:
   - This method is specifically used to retrieve a record by its primary key. For example: `DB::table('users')->find(1);`
   - It's a quick and convenient way to retrieve a single record without needing to specify a `where` clause for the primary key.
   - `find()` also returns `null` if no record is found.
   - It can also take an array of primary keys, in which case it returns a collection of matching records, not just a single record.

In summary, use `first()` when you need to retrieve the first record that matches certain conditions, and use `find()` when you want to retrieve a record by its primary key.
 


#### 7. Write the code to retrieve the "title" column from the "posts" table using Laravel's query builder. Store the result in the $posts variable. Print the $posts variable.

Ans: 
```sql
$posts = DB::table('posts')->pluck('title');

print_r($posts);
```
 


#### 8. Write the code to insert a new record into the "posts" table using Laravel's query builder. Set the "title" and "slug" columns to 'X', and the "excerpt" and "description" columns to 'excerpt' and 'description', respectively. Set the "is_published" column to true and the "min_to_read" column to 2. Print the result of the insert operation.

Ans:
``` sql
$data = [
    'title' => 'X',
    'slug' => 'X',
    'excerpt' => 'excerpt',
    'description' => 'description',
    'is_published' => true,
    'min_to_read' => 2,
];

$result = DB::table('posts')->insert($data);

print_r($result);
```
 


#### 9. Write the code to update the "excerpt" and "description" columns of the record with the "id" of 2 in the "posts" table using Laravel's query builder. Set the new values to 'Laravel 10'. Print the number of affected rows.

Ans:
```sql
$affectedRows = DB::table('posts')
    ->where('id', 2)
    ->update([
        'excerpt' => 'Laravel 10',
        'description' => 'Laravel 10'
    ]);

print_r($affectedRows);
```


#### 10. Write the code to delete the record with the "id" of 3 from the "posts" table using Laravel's query builder. Print the number of affected rows.

Ans:
```sql
$affectedRows = DB::table('posts')
    ->where('id', 3)
    ->delete();

print_r($affectedRows);
```


#### 11. Explain the purpose and usage of the aggregate methods count(), sum(), avg(), max(), and min() in Laravel's query builder. Provide an example of each.
Ans:
In Laravel's query builder, aggregate methods such as `count()`, `sum()`, `avg()`, `max()`, and `min()` are used to perform calculations on specific columns of a database table. These methods provide a convenient way to retrieve summarized information from the database.

1. `count()`: The `count()` method is used to retrieve the total number of rows or records that match a specific condition. It can be used with or without a condition.

   Example:
   ```php
   use Illuminate\Support\Facades\DB;

   $count = DB::table('posts')->count();

   echo $count;
   ```

2. `sum()`: The `sum()` method calculates the sum of the values in a specific column. It is commonly used with numeric columns.

   Example:
   ```php
   use Illuminate\Support\Facades\DB;

   $totalAmount = DB::table('orders')->sum('amount');

   echo $totalAmount;
   ```

3. `avg()`: The `avg()` method calculates the average (mean) value of the values in a specific column. It is often used with numeric columns.

   Example:
   ```php
   use Illuminate\Support\Facades\DB;

   $averageRating = DB::table('reviews')->avg('rating');

   echo $averageRating;
   ```

4. `max()`: The `max()` method retrieves the maximum value from a specific column.

   Example:
   ```php
   use Illuminate\Support\Facades\DB;

   $maxPrice = DB::table('products')->max('price');

   echo $maxPrice;
   ```

5. `min()`: The `min()` method retrieves the minimum value from a specific column.

   Example:
   ```php
   use Illuminate\Support\Facades\DB;

   $minQuantity = DB::table('inventory')->min('quantity');

   echo $minQuantity;
   ```

These aggregate methods are useful when you want to perform calculations and retrieve summarized information from your database tables. They provide a simple and efficient way to obtain statistics and metrics from your data.

 


#### 12. Describe how the whereNot() method is used in Laravel's query builder. Provide an example of its usage.

Ans: The `whereNot()` method in Laravel's query builder adds a "not equal" condition to the query. It allows you to retrieve records that do not match a specific value or condition.

Example usage:

```php
$users = DB::table('users')
    ->whereNot('status', 'active')
    ->get();
```

This code retrieves all users from the "users" table where the "status" column is not equal to 'active'. The `whereNot()` method provides a convenient way to filter records based on a "not equal" condition in Laravel's query builder.
 


#### 13. Explain the difference between the exists() and doesntExist() methods in Laravel's query builder. How are they used to check the existence of records?

Ans: The `exists()` and `doesntExist()` methods in Laravel's query builder are used to check the existence of records in a database table.

Example usage of `exists()`:

```php
$exists = DB::table('users')->where('status', 'active')->exists();
```

This code checks if there are any records in the "users" table where the "status" column is 'active'. It returns `true` if matching records exist.

Example usage of `doesntExist()`:

```php
$doesntExist = DB::table('users')->where('status', 'inactive')->doesntExist();
```

This code checks if there are no records in the "users" table where the "status" column is 'inactive'. It returns `true` if no matching records are found.

These methods provide a concise way to check the existence or non-existence of records based on specific conditions in Laravel's query builder.
 


#### 14. Write the code to retrieve records from the "posts" table where the "min_to_read" column is between 1 and 5 using Laravel's query builder. Store the result in the $posts variable. Print the $posts variable.

Ans: 
```sql
$posts = DB::table('posts')
    ->whereBetween('min_to_read', [1, 5])
    ->get();

print_r($posts);
```
 


#### 15. Write the code to increment the "min_to_read" column value of the record with the "id" of 3 in the "posts" table by 1 using Laravel's query builder. Print the number of affected rows. 
Ans:
```sql
$affectedRows = DB::table('posts')
    ->where('id', 3)
    ->increment('min_to_read');

print_r($affectedRows);
```