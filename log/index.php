<?php
// 程序版本号 [2015-10-7] Added.
$version = '3.2';

// 主配置 [2015-10-7] Added.
$config = array();

$action = I('ac');
$view = I('view');
$path = I('path', '/'); // urldecode($_GET['path']) $_SERVER['DOCUMENT_ROOT']
$parent_path = path_getdir($path);
?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <title>SuExplorer-<?php echo $version ?></title>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <style type="text/css">
      body {
        font-size: 12px;
        color: #333;
      }

      a {
        text-decoration: none;
      }

      textarea {
        font-size: 12px;
        line-height: 18px;
        padding: 5px;
      }

      th {
        font-weight: normal;
      }

      .userbar a:before {
        content: '['
      }

      .userbar a:after {
        content: ']'
      }

      .dir-contents {
        width: 1050px;
        display: table;
      }

      .dir-contents a {
        margin-right: 50px;
        line-height: 30px;
        font-size: 14px;
        text-decoration: none;
        float: left;
      }

      .blue {
        color: #0000DB
      }

      .lightblue {
        color: #1bd1a5
      }

      .purple {
        color: #9900ff
      }

      .green {
        color: #009900
      }

      .red {
        color: #F00
      }

      .grey {
        color: #999;
      }

      .nav {
        line-height: 28px;
        margin-bottom: 15px;
      }

      .nav a {
        color: #333;
        font-size: 18px;
      }

      .nav a:before {
        content: ' » '
      }

      .nav a:first-child:before {
        content: ''
      }

      .nav div {
        color: #CCC;
        border-bottom: solid 1px #CCC;
        margin-bottom: 5px;
      }
    </style>
  </head>
  <body>
  <div><?php SuExplorer::index($view, $path) ?></div>
  </body>
  </html>
<?php
/**
 * 获取浏览器参数
 * @param string $name
 * @param mixed $defv
 * @return mixed
 * @since 1.0 <2015-8-13> SoChishun Added.
 */
function I($name, $defv = '')
{
    if (isset($_GET[$name])) {
        return $_GET[$name];
    }
    return isset($_POST[$name]) ? $_POST[$name] : $defv;
}

/**
 * URL重定向
 * @param string $param 重定向的URL地址
 * @param integer $time 重定向的等待时间（秒）
 * @param string $msg 重定向前的提示信息
 * @return void
 * @since 1.0 <2015-10-7> from ThinkPHP
 */
function redirect($param, $time = 0, $msg = '')
{
    global $_W;
//    $param = str_replace('?', '&', $param);
//    $url = $_W['siteroot'] . "web/index.php?c=site&a=entry&do=files&module_name=jy_lbsh" . $param;
    $url = $_W['siteroot'] . "/addons/jy_lbsh/log/" . $param;
//    print_r($url);exit;
    if (empty($msg))
        $msg = "系统将在{$time}秒之后自动跳转到{$url}！";
    if (!headers_sent()) {
        // redirect
        if (0 === $time) {
            header('Location: ' . $url);
        } else {
            header("refresh:{$time};url={$url}");
            echo($msg);
        }
        exit();
    } else {
        $str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if ($time != 0)
            $str .= $msg;
        exit($str);
    }
}

/**
 * 获取文件扩展名类型
 * @param string $exten 扩展名(不带.)
 * @return string
 * @since 1.0 <2015-10-9> SoChishun Added.
 */
function get_exten_catetory($exten)
{
    if ($exten) {
        $filetypes = array('zip' => array('zip', 'rar', '7-zip', 'tar', 'gz', 'gzip'), 'doc' => array('txt', 'rtf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'wps', 'et'), 'script' => array('php', 'js', 'css', 'c'), 'image' => array('jpg', 'jpeg', 'png', 'gif', 'tiff', 'psd', 'bmp', 'ico'));
        foreach ($filetypes as $catetory => $extens) {
            if (in_array($exten, $extens)) {
                return $catetory;
            }
        }
    }
    return '';
}

/**
 * 绝对路径转相对路径
 * @param string $path
 * @return string
 * @since 1.0 <2015-10-9> SoChishun Added.
 */
function path_ator($path)
{
    $root = $_SERVER['DOCUMENT_ROOT'];
    $path = substr($path, strlen($root));
    if ('/' != DIRECTORY_SEPARATOR) {
        $path = str_replace(DIRECTORY_SEPARATOR, '/', $path);
    }
    return $path;
}

/**
 * 相对路径转绝对路径
 * @param string $path
 * @return string
 * @since 1.0 <2015-10-9> SoChishun Added.
 */
function path_rtoa($path)
{
    $root = $_SERVER['DOCUMENT_ROOT'] . '/addons/jy_lbsh/log';
    if ('/' != DIRECTORY_SEPARATOR) {
        $path = str_replace('/', DIRECTORY_SEPARATOR, $path);
    }
    return $root . $path;
}

/**
 * 获取文件的目录地址
 * @param string $path
 * @param boolean $is_r 是否相对路径
 * @return string
 * @since 1.0 <2015-10-9> SoChishun Added.
 */
function path_getdir($path, $is_r = true)
{
    if (!$path || is_dir($is_r ? path_rtoa($path) : $path)) {
        return $path;
    }
    return pathinfo($path, PATHINFO_DIRNAME);
}

/**
 * 页面主类
 * @since 1.0 <2015-5-11> SoChishun <14507247@qq.com> Added.
 * @since 3.0 <2015-10-7> SoChishun 重构.
 */
class SuExplorer
{
    /**
     * 版本号
     * @var string
     * @since 1.0 <2015-10-7> SoChishun Added.
     */
    const VERSION = '3.0.0';

    /**
     * 显示网站目录的项目内容
     * @since 1.0 <2015-5-11> SoChishun Added.
     */
    static function index($view, $path)
    {
        // 面包屑导航
        self::location_to_breadcrumb($path);
        // 视图显示
        switch ($view) {
            default:
                // 列出文件
                $sapath = path_rtoa($path);
                if (is_dir($sapath)) {
                    self::view_content_list($path);
                } else if (is_file($sapath)) {
                    self::view_edit_file($path);
                } else {
                    echo '<strong class="red">文件或目录不存在或已删除!</strong>';
                }
                break;
        }
    }

    /**
     * 获取真实地址
     * @param $param
     * @return mixed
     */
    static function getRealUrl($param)
    {
        global $_W;
//        $param = str_replace('?', '&', $param);
//        $url = $_W['siteroot'] . "web/index.php?c=site&a=entry&do=files&module_name=jy_lbsh" . $param;
        $url = $_W['siteroot'] . "/addons/jy_lbsh/log/" . $param;
        return $url;
    }

    /**
     * 目录内容视图
     * @param type $path
     * @since 1.0 <2015-5-11> SoChishun Added.
     */
    static function view_content_list($path)
    {
        $files = self::get_dir_contents($path, array('name' => true, 'path' => false, 'real_path' => false, 'relative_path' => true, 'exten' => false, 'ctime' => false, 'mtime' => false, 'size' => false, 'is_dir' => true, 'is_file' => false, 'is_link' => true, 'is_executable' => true, 'is_readable' => false, 'is_writable' => false, 'filetype' => true));
        echo '<div class="dir-contents" title="蓝色表示目录,灰色表示其他文件">';
//        print_r($files);
        foreach ($files as $file) {
            if ($file['relative_path'] == '/addons/jy_lbsh/log/index.php') continue;
            if ($file['is_dir']) {
                $url = '?path=' . $file['relative_path'];
                $url = str_replace('/addons/jy_lbsh/log', '', $url);
                $url = self::getRealUrl($url);
                echo '<a style="clear:both" href="' . $url . '" class="blue"><strong>' . $file['name'] . '</strong></a><br/>';
            } else {
                $class = 'red';
//                if ($file['is_link']) {
//                    $class = 'lightblue';
//                } else if ($file['is_executable']) {
//                    $class = 'green';
//                } else {
//                    switch ($file['filetype']) {
//                        case 'image':
//                            $class = 'purple';
//                            break;
//                        default:
//                            $class = 'grey';
//                            break;
//                    }
//                }
//                $url = '?path=' . $file['relative_path'];
//                $url = str_replace('/addons/jy_lbsh/log', '', $url);
//                $url = self::getRealUrl($url);
//                echo '<a style="clear:both" href="' . $url . '" class="' . $class . '">' . $file['name'] . '</a><br/>';

                $url =  $file['relative_path'];
                echo '<a class="' . $class . '" target="_blank" href="' . $url . '" class="' . $class . '">' . $file['name'] . '</a>';

            }
        }
        echo '<div style="clear:both"></div></div>';
    }

    /**
     * 文件内容编辑视图
     * @param type $path
     * @since 1.0 <2015-5-11> SoChishun Added.
     */
    static function view_edit_file($path)
    {
        $sapath = path_rtoa($path);
        if (!is_file($sapath)) {
            return;
        }
        $category = get_exten_catetory(pathinfo($path, PATHINFO_EXTENSION));
        $path = '/addons/jy_lbsh/log' . $path;
        switch ($category) {
//            case 'image':
//                echo '<img src="', $path, '" alt="" style="max-width:800px;max-height:640px;" /><br />';
//                echo basename($path);
//                echo ' <a href="', $path, '" target="_blank">[查看]</a>';
//                echo ' <a href="', $path, '" target="_blank">' . basename($path) . '</a>';
//                break;
            default:
//                echo basename($path);
//                echo ' <a href="', $path, '" target="_blank">[查看]</a>';
                echo ' <a class="red" href="', $path, '" target="_blank">' . basename($path) . '</a>';
                break;
        }
    }

    /**
     * 返回指定路径下的内容
     * @param string $directory 路径
     * @param array $config 选项
     * @return array
     * @throws Exception
     * @since 1.0 <2015-5-11> SoChishun Added.
     * @since 1.1 <2015-10-8> SoChishun 新增filetype文件类别属性
     */
    static function get_dir_contents($directory, $options = array())
    {
        $config = array('name' => true, 'path' => true, 'real_path' => true, 'relative_path' => false, 'exten' => false, 'ctime' => false, 'mtime' => false, 'size' => false, 'is_dir' => true, 'is_file' => false, 'is_link' => false, 'is_executable' => false, 'is_readable' => false, 'is_writable' => false, 'filetype' => false);
        if ($options) {
            $config = array_merge($config, $options);
        }
        try {
            $dir = new DirectoryIterator(path_rtoa($directory));
        } catch (Exception $e) {
            throw new Exception($directory . ' is not readable');
        }
        $files = array();
        foreach ($dir as $file) {
            if ($file->isDot()) {
                continue;
            }
            if ($config['name']) {
                $item['name'] = $file->getFileName();
            }
            if ($config['path']) {
                $item['path'] = $file->getPath();
            }
            if ($config['real_path']) {
                $item['real_path'] = $file->getRealPath();
            }
            if ($config['relative_path']) {
                $item['relative_path'] = path_ator($file->getRealPath());
            }
            $exten = $file->getExtension();
            if ($config['exten']) {
                $item['exten'] = $exten;
            }
            if ($config['filetype']) {
                $item['filetype'] = get_exten_catetory($exten);
            }
            if ($config['mtime']) {
                $item['mtime'] = $file->getMTime();
            }
            if ($config['ctime']) {
                $item['ctime'] = $file->getCTime();
            }
            if ($config['size']) {
                $item['size'] = $file->getSize();
            }
            if ($config['is_dir']) {
                $item['is_dir'] = $file->isDir();
            }
            if ($config['is_file']) {
                $item['is_file'] = $file->isFile();
            }
            if ($config['is_link']) {
                $item['is_link'] = $file->isLink();
            }
            if ($config['is_executable']) {
                $item['is_executable'] = $file->isExecutable();
            }
            if ($config['is_readable']) {
                $item['is_readable'] = $file->isReadable();
            }
            if ($config['is_writable']) {
                $item['is_writable'] = $file->isWritable();
            }
            $files[] = $item;
        }
        return $files;
    }

    /**
     * 路径转为导航
     * @param string $path
     * @since 1.0 <2015-5-11> SoChishun Added.
     */
    static function location_to_breadcrumb($path)
    {
        $url = '?path=/';
        $url = self::getRealUrl($url);
        echo '<div class="nav"><a href="' . $url . '">日志首页</a>';
        if ('/' != $path) {
            $asubpath = explode('/', substr($path, 1));
            if ($asubpath) {
                $str = '';
                foreach ($asubpath as $sub) {
                    $str .= '/' . $sub;
                    $url = '?path=' . $str;
                    $url = self::getRealUrl($url);
                    echo '<a href="', $url, '">', $sub, '</a>';
                }
            }
        }
//        echo '<div>', path_rtoa($path), '</div>';
        echo '</div>';
    }

}
