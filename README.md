## debugging func
- var_dump();
- dump();

## migrations 
 - The cascadeOnDelete method is used in migration 
 - Here we had created a relationship user and idea table ever user have multiple ideas. 
 - When user is deleted from the user table cascadeOnDelete method will delete the user related idea in a current table

```
 cascadeOnDelete();

```

### This below comment will re run the last two migration file
```
php artisan migrate:refresh --step-2
```