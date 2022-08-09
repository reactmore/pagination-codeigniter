# CodeIgniter 4 Application Starter

## Pagination

Related files : 
- Controllers/Home.php
- Models/UsersModel.php
- views/_pagination.php
- views/welcome_messages.php
- Common.php

Problem : 
If i use code version 4.2.3 Undefined variable $pager 
```php
// File : System/Pager/Pager/php on Line 117 
protected function displayLinks(string $group, string $template): string
    {
        if (!array_key_exists($template, $this->config->templates)) {
            throw PagerException::forInvalidTemplate($template);
        }

        $pager = new PagerRenderer($this->getDetails($group));

        // v4.2.3 
        return $this->view->setVar('pager', $pager)->render($this->config->templates[$template], null, false);
        // v4.2.1
        return $this->view->setVar('pager', $pager)->render($this->config->templates[$template]);
    }
```

## Database 

```sql
CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(999) DEFAULT NULL,
  `address` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
```


Seed Users Table : 

```
php spark fake:users
```