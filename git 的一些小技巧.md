# git 的一些常用方法
### 通常可以把 git 想成四層結構, 
    第一層是文件目錄結構, 
    第二層是你修改之後 git add . 到的地方, 也稱爲工作層, 
    第三層 就是你 git commit 到的地方 ,也稱爲暫存層. 
    還有一層經常被人忽略,是遠程層, 這一層保存著所有的遠程分支.這一層保存著 git fetch 下來的内容. 
    
    通常所説的 拉 . git pull 其實是 git fetch dev + git merge origin/dev .兩步操作, 這裏的 dev 是你本地和遠程的一個分支名稱. 如果要拉的遠程分支和當前正在操作的分支不是一個分支,就需要 git checkout 切換分支.


### git branch 查看本地分支 後面跟分支名可以新建分支

    git branch -r 查看遠程分支
    git branch -a 查看所有分支
    git branch -vv 查看本地分支和遠程分支的綁定關係

### git checkout 查看當前操作的分支 後面跟分支名可以切換到分支

    git checkout -- filepathname 此命令用来放弃掉所有还没有加入到缓存区（就是 git add 命令）的修改
    git checkout . 放棄所有修改

### git merge 後面跟分支名 就可以將寫的分支 和 當前正在操作的分支合并了.

### git remote 列出已经存在的远程分支

    git remote add [shortname][url] 創建一個到遠程地址的鏈接, 第一個參數是 自己起的名字(隨便起),第二個參數是遠程地址的鏈接
    git remote -v 列出已經存在的遠程分支的詳細信息

### git add 將我們需要提交的代碼從工作區添加到暫存區

    git add . 將所有的修改過的文件提交到暫存區
    git add -i 交互式的提交
    git add -A 提交全部
    git add -u 提交修改不包括新增的文件

### git status 查看工作區和暫存區的區別

### git pull 將網上的分支拉到本地並與當前分支進行合并, 如果後面什麽都沒有的話,就會將網上默認和當前分支鏈接的分支與當前分支合并

### git fetch 同步本地的遠程内容, 同步之後就可以把遠程分支和當前分支進行合并.

### git merge 將兩個分支進行合並. 後面跟一個分支的名字,就會將對應分支的内容合并到當前分支. 這裏的分支名稱可以 origin/master . 第一個是遠程地址的名字,第二個是遠程地址的分支的名字, 這樣就可以和遠程分支進行合并. 合并遠程分支之前應該先 git fetch

### git commit 提交暫存區的内容到倉庫中,每次提交的時候都需要寫明版本信息,更新了那些内容,便於版本管理. 也就是說可以經常 git add 到工作去, 確定沒問題了, 在gti commit .

### git push 後面如果什麽都沒有,就可以直接提交儅當前分支綁定的分支, 你也可以指定 git push origin/dev . 指定一個分支進行上傳.

### git config

### git clone

### git show

### git starts 

### git init 初始化

### git status 

### git diff 
