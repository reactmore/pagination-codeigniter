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