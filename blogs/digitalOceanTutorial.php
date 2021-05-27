<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Ocean </title>
</head>

<body>


    <?php include './headerForBlogs.php'; ?>

    <link rel="stylesheet" href="../css/Gitbashsndlinuxcommands.css">




    <div class="containAll">


        <h1> Digital Ocean and SSH Tutorial</h1><br>
        <div class="imgCont"><img src='../images/digitalOcean.jpg' width="300px" alt='Some Text' /></div>

        <div class='dottedLines'>
            <h2> --------------------------------------------------------------------------------------<br>
                Digital Ocean Tutorial with SSH Keys, Ubantu, and Apache2 <br>
                ---------------------------------------------------------------------------------------
            </h2>
        </div>


        <h4>Create Keys For Droplet</h4>
        <p> <span>First make an account with Digital Ocean</span></p>
        <p> <span>Make SSH keys in terminal </span> ssh-keygen + enter </p>
        <p> <span>To Make specific SSH key files</span> Follow below ⇩</p>
        <p><b>* Private keys stay on your local machine, it's the file with no .pub on the end</b>
        <p>⇩ open a text editor and paste the new location in because it's real sensative when entering ⇩ </p>
        (/c/Users/Joseph/.ssh/id_rsa): /c/Users/Joseph/.ssh/id_rsa_NewFileName) , both files will be the same, private and .pub.</p>
        <p> <span>Grab Public Key</span> cat ~/.ssh/id_rsa_Ocean.pub + enter.</p>
        <p>Then copy all of the key even the computer name. </p><br>
        <h3> Paste Public Key into new droplet on Digital Ocean </h3>
        <p><span>Try logging in </span> ssh root@12.234.456 + enter, If Denied, it's because you made specific .ssh key filenames other than defaults see below ⇩ </p>
        <p><span>If you were denied to login </span> ssh-add ~/.ssh/id_rsa_nameKey [Dont use .pub on end]. whatever name you used then LOGIN again </p>
        <p><span>Update server</span> sudo apt update </p>
        <p><span>Upgrade </span> sudo apt upgrade </p>
        <p><span>See Root folder </span>[cd/ + enter] then [ls + enter] </p>
        <p><span>Back to home </span> cd + enter </p><br>

        <h3>Create a new user instead of using root, give sudo privlages, & disable the root login</h3>
        <h4>new user </h4>
        <p><span>adduser</span> [adduser joey + enter] password: 1234</p>
        <p><span>see user</span> id joey + enter</p>
        <br>
        <h4>Sudo privlages </h4>
        <p><span>Add sudo privlages to user</span> usermod -aG sudo joey</p>
        <p><span>see user now with sudo privlages</span> id joey + enter</p>

        <br>
        <h4>Add public key to the new user </h4>
        <p><span>Try Login </span> joey@12.345.67 DENIED, because we added public key to the root innitially</p>
        <p><span>Login as root again</span> ssh root@12.234.456</p>
        <p><span>cd into the users directory</span> cd /home/joey + enter</p>
        <p><span>Create folder</span> [mkdir .ssh + enter], [cd .ssh + enter], [touch authorized_keys], </p>
        <p><span>Grab keys again</span> Open another terminal to get .pub key, [cat ~/.ssh/id_rsa_Ocean.pub + enter], copy them </p>
        <p><span>Paste public key inside users .ssh folder</span> Back in terminal where logged in, [sudo nano authorized_keys + enter], then paste public key inside there. [ctrl + x to save], y for yes + enter </p>
        <p><span>Logout from root</span> exit + enter</p>
        <p><span>Log in as user</span> joey@12.345.67 ... Works</p><br>
        <h3>Disable root login<h3>
                <p><span>Go inside sshd_config </span> sudo nano /etc/ssh/sshd_config</p>
                <p><span>Set the permissions</span> [PermitRootLogin no], [PasswordAuthentication no] use arrows to find them </p><br>
                <h3>Install Apache</h3>
                <p><span>Install Apache</span> sudo apt install apache2 -y</p>
                <p>
                <h5>Your all set up from here!</h5><br>

                <h4>Change owner of /home/joey/* to joey</h4>
                <p>* The reason for doing this is to create ssh keys inside here and get ssh with githubs ssh</p>
                <p> [sudo chown -R joey:joey /home/joey + enter], Might need to set permission [chmod 700 /home/joey/.ssh + enter]</p>



    </div>









    <?php include 'footerForBlogs.php'; ?>























</body>

</html>