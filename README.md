Untuk membuat README.md lengkap dengan langkah-langkah konfigurasi, berikut ini adalah contoh isi yang bisa Anda gunakan untuk proyek GitHub Anda (`php-demo-azure-devops`):

```markdown
# PHP Demo for Azure DevOps

This repository contains a simple PHP application set up for automated deployment using Azure DevOps pipelines.

## Prerequisites

Before you begin, ensure you have the following set up:
- Azure DevOps account
- SSH service connection configured in Azure DevOps

## Getting Started

### Clone Repository

```bash
git clone https://github.com/bungyan-cyber/php-demo-azure-devops.git
cd php-demo-azure-devops
```

### Update `index.php`

Make sure your `index.php` file contains the following content or update as needed:

```php
<?php
echo "Hello, Azure DevOps!";
```

### Configure Azure DevOps Pipeline

1. **Create Azure Pipelines YAML**

   Create or update the `azure-pipelines.yml` file in the root of your repository with the following content:

   ```yaml
   trigger:
     branches:
       include:
         - main
   
   pool:
     name: 'default'
   
   jobs:
     - job: Build
       steps:
         - script: |
             sudo apt-get update
             sudo apt-get install -y php
             php -v
             php index.php
           displayName: 'Install PHP and run script'
   
     - job: Deploy
       dependsOn: Build
       steps:
         - task: CopyFilesOverSSH@0
           inputs:
             sshEndpoint: 'mySSHServiceConnection'
             sourceFolder: '$(Build.Repository.LocalPath)'
             targetFolder: '/var/www/html'
             cleanTargetFolder: false
           displayName: 'Copy files to web server'
   
         - task: SSH@0
           inputs:
             sshEndpoint: 'mySSHServiceConnection'
             runOptions: 'inline'
             inline: |
               sudo systemctl restart apache2
             failOnStdErr: true
           displayName: 'Restart Apache'
   ```

2. **Commit and Push Changes**

   Commit your changes to `azure-pipelines.yml` and push them to your GitHub repository.

3. **Configure SSH Service Connection in Azure DevOps**

   - Navigate to your Azure DevOps project.
   - Go to `Project Settings` > `Service connections` > `New service connection` > `SSH`.
   - Enter the SSH details for your server (hostname, username, and password).

4. **Run the Pipeline**

   - Trigger the pipeline manually for the first time or set up a trigger to run on every commit to the `main` branch.

## Troubleshooting

- If you encounter permission issues during deployment (`Permission denied` errors), ensure that the SSH user (`devops`) has appropriate permissions on the target server (`/var/www/html`).

## References

- [Azure DevOps Documentation](https://docs.microsoft.com/azure/devops/pipelines/?view=azure-pipelines)

Feel free to customize this README.md according to your specific project details and setup instructions.
```

Silakan sesuaikan informasi dan langkah-langkah konfigurasi dengan detail yang sesuai dengan proyek Anda.
