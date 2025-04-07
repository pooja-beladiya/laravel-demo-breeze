@servers(['web' => '127.0.0.1'])

@task('deploy')
    cd /home/pooja.beladiya@brainvire.com/htdocs/Demo/breeze
    php artisan optimize:clear
    git pull origin main
@endtask
