# Test Jarvis Legal

### Requirements
---

- Apache 2.4
- PHP 7.4
- MySQL 5.7
- Composer

### Usage
---

### Installation
---

```
git clone https://github.com/jonathankablan/test_jarvis_legal.git
cd test_jarvis_legal
./install.sh
```

### Installation front-end
---

### Configuration database
---

```
# Créer la base de donnée si cette base n'hesite pas encore 
# -f signifie --force pour force l'excecution 
- bin/console doctrine:database:create -f

# met a jour les entites en base de donnée
- bin/console doctrine:schema:update -f

# Lance les fixtures pour avoir des données de test en base
- bin/console hautelook:fixtures:load --no-bundles
```

=======
### Configuration jwt
---

- Jwt Generating the Public and Private Key
```
composer require lexik/jwt-authentication-bundle
```
- Generating the Public and Private Key

```
$ mkdir config/jwt
$ openssl genrsa -out config/jwt/private.pem -aes256 4096
$ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
Password jwt: JarvIs2020*22
```

- Configuring the Bundle

```
lexik_jwt_authentication:
    private_key_path: %kernel.root_dir%/../var/jwt/private.pem
    public_key_path:  %kernel.root_dir%/../var/jwt/public.pem
    pass_phrase:      %jwt_key_pass_phrase%
    token_ttl:        3600
```

### Configuration
---

### Authors / Maintainers
---

- Jonathan Kablan


![Screenshot](https://github.com/jonathankablan/test_jarvis_legal/app/symfony/public/uploads/images/screenshot.png)