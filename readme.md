# Welcome Shindig Developers

This repository has a .gitignore which only tracks custom development. 

You may specify a child theme or custom plugin at the end of that file
if you would like to see it tracked here. 

This git repo will function as the single source of truth and will be
used to overwrite any files on the live and staging servers. 

## Dependencies
* [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
* A local development server (MAMP, XAMPP, Docker, WAMP)

We use EditorConfig to "maintain consistent coding styles for multiple
developers working on the same project across various editors and IDEs". 

Some editors integrate this by default, most will need a plugin. These are
detailed on the EditorConfig [download page](https://editorconfig.org/#download) 

## Getting started

You will need the following: 

1. A WordPress development server set up locally 
2. A copy of the current plugins, mu-plugins, and reign parent theme from the server 
3. A copy of the database, with URLs modified for your local 
4. Delete all endurance files from mu-plugins 
5. Make sure your htaccess is a default WordPress file 
6. Once logged in to your local, you need to recreate Elementor layouts.
Go to Elementor > Tools > General > Regenerate Files 
7. Elementor also has a Replace URLs tab to update any missed rows. 
8. You will want to delete the plugin really-simple-ssl

## Contributing
 1. Create a branch 
 2. Make distinct commits for each complete change 
 3. Push code, start a Pull Request or merge to master 
 4. If you have access you can then make your changes live via FTP 

You can read about this on the [GitHub Flow](https://guides.github.com/introduction/flow/)
documentation. Note side arrows to progress through those docs.

_Most importantly_ Branching is a core concept in Git, and the entire development flow is based 
upon it. There's only one rule: anything in the master branch is always deployable.

Because of this, it's extremely important that your new branch is created off of master when
working on a feature or a fix. Your branch name should be descriptive 
(e.g., refactor-authentication, user-content-cache-key, make-retina-avatars), so that others
can see what is being worked on.


## Troubleshooting
If your local installation keeps redirecting, alter your sql:
`UPDATE wp_wiy8jwtuzp_options SET option_value = 'http://shindig.local' WHERE option_name = 'wsl_settings_redirect_url';` 
`UPDATE wp_wiy8jwtuzp_options SET option_value = 'http://shindig.local' WHERE option_name = 'siteurl';` 
`UPDATE wp_wiy8jwtuzp_options SET option_value = 'http://shindig.local' WHERE option_name = 'home';` 
