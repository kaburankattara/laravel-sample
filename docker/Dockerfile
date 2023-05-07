FROM centos:7
ENV container docker
RUN (cd /lib/systemd/system/sysinit.target.wants/; for i in *; do [ $i == \
systemd-tmpfiles-setup.service ] || rm -f $i; done); \
rm -f /lib/systemd/system/multi-user.target.wants/*;\
rm -f /etc/systemd/system/*.wants/*;\
rm -f /lib/systemd/system/local-fs.target.wants/*; \
rm -f /lib/systemd/system/sockets.target.wants/*udev*; \
rm -f /lib/systemd/system/sockets.target.wants/*initctl*; \
rm -f /lib/systemd/system/basic.target.wants/*;\
rm -f /lib/systemd/system/anaconda.target.wants/*;

RUN yum -y update \
yum -y install epel-release && \
yum -y install http://rpms.famillecollet.com/enterprise/remi-release-7.rpm && \
yum -y install httpd git zip unzip gcc php74 php74-php php74-php-bcmath php74-php-ctype php74-php-json php74-php-mbstring php74-php-openssl php74-php-tokenizer php74-php-xml && \
yum -y --enablerepo=remi,epel install php74-php-pdo && \
yum -y --enablerepo=remi,epel install php74-php-mysql && \
yum -y --enablerepo=remi,epel install php74-php-pgsql && \
ln -s /usr/bin/php74 /usr/bin/php && \
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
#php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
php composer-setup.php && \
php -r "unlink('composer-setup.php');" && \
mv composer.phar /usr/local/bin/composer && \
composer global require laravel/installer

RUN yum clean all; systemctl enable httpd.service

VOLUME ["/sys/fs/cgroup"]
CMD ["/usr/sbin/init"]
