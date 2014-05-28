set :application, "blog"
set :domain,      "12_polaczek@wierzba.wzks.uj.edu.pl"
set :deploy_to,   "/public_html/blog.pl"
set :app_path,    "blog.pl"
default_run_options[:pty] = true

set :repository,  "/Users/Kuba/Desktop/php/blog.git"
set :deploy_via, :rsync_with_remote_cache
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`

set :model_manager, "doctrine"
# Or: `propel`

role :web,        "12_polaczek@wierzba.wzks.uj.edu.pl"                         # Your HTTP server, Apache/etc
role :app,        "12_polaczek@wierzba.wzks.uj.edu.pl", :primary => true       # This may be the same as your `Web` server

set  :keep_releases,  3

# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL