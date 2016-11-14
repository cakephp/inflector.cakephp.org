# CakePHP Inflector

http://inflector.cakephp.org

Running with CakePHP 2.9.2

## Deploying

On the Dokku server:

```shell
# create the app
dokku apps:create inflector
```

On your local computer:

```shell
# add the remote
git remote add dokku dokku@SERVER_IP:inflector

# push the app
git push dokku master
```
