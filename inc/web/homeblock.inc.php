<?php
 goto Fwn8j; c9Zm6: $where = "\127\x48\x45\x52\105\40\x75\x6e\x69\x61\143\x69\x64\75\x3a\x75\156\151\141\143\151\x64"; goto yK9tM; NfOco: Pax2D: goto JcR4E; rvoF3: $pagesize = 10; goto zVRfq; ggvtv: if ($res) { goto R2GEM; } goto PFOyO; Aa6_w: message("\345\x88\xa0\351\231\xa4\346\x88\220\345\212\x9f", $this->createWebUrl("\x68\x6f\155\x65\x62\x6c\x6f\143\x6b", array()), "\163\x75\x63\143\x65\163\x73"); goto IfKsv; zVRfq: $sql = "\x73\145\154\x65\143\164\40\52\40\x66\162\157\x6d\40" . tablename("\x6c\142\x73\150\x5f\x68\157\x6d\145\x62\x6c\x6f\143\x6b") . $where . "\40\157\x72\144\x65\162\40\x62\x79\x20\x6f\162\x64\x65\x72\x62\171\x20\141\163\143"; goto m9fe8; zqAxh: $list = pdo_fetchall($select_sql, $data); goto AXhS_; IEdfQ: goto S96GO; goto LCx7q; m9fe8: $select_sql = $sql . "\x20\x4c\111\115\x49\124\x20" . ($pageindex - 1) * $pagesize . "\54" . $pagesize; goto o17BL; HAJ0d: $res = pdo_delete("\x6c\142\163\x68\x5f\150\157\155\x65\142\x6c\157\143\x6b", array("\x69\x64" => $_GPC["\x69\144"])); goto ggvtv; Fwn8j: global $_GPC, $_W; goto HzVI0; AXhS_: if (!($_GPC["\x6f\x70"] == "\144\145\154")) { goto Pax2D; } goto HAJ0d; UpbSa: cache_delete($keys); goto Aa6_w; FBQ8a: $key_arr = array("\x75\x6e\151\x61\x63\x69\144" => $_W["\165\156\151\141\143\x69\x64"]); goto lx5Jf; Oz6bp: $pageindex = max(1, intval($_GPC["\160\x61\147\145"])); goto rvoF3; LCx7q: R2GEM: goto F1sq5; PFOyO: message("\xe5\x88\240\351\x99\244\345\244\261\350\xb4\245", '', "\145\x72\x72\157\162"); goto IEdfQ; uqes7: slD3N: goto UpbSa; xnVvt: $pager = pagination($total, $pageindex, $pagesize); goto zqAxh; lx5Jf: if (!$key_arr) { goto slD3N; } goto XqYM3; IfKsv: S96GO: goto NfOco; o17BL: $total = pdo_fetchcolumn("\x73\x65\x6c\145\x63\164\x20\x63\157\x75\156\164\x28\52\51\40\146\162\157\155\x20" . tablename("\154\x62\x73\150\x5f\150\157\x6d\x65\x62\154\157\143\x6b") . $where . "\x20\x6f\162\144\x65\x72\x20\142\171\x20\157\162\x64\x65\x72\142\171\x20\x61\163\x63", $data); goto xnVvt; XqYM3: $keys = $keys . md5(json_encode($key_arr)) . md5(json_encode(array("\160\x78\40\x61\x73\143", "\x6f\162\144\145\x72\x62\x79\40\141\x73\143"))); goto uqes7; yK9tM: $data["\x3a\165\x6e\x69\x61\x63\151\144"] = $_W["\165\156\x69\x61\143\x69\x64"]; goto Oz6bp; F1sq5: $keys = "\x68\x6f\x6d\145\142\154\157\143\x6b" . $_W["\165\156\151\141\143\151\144"] . "\x61\x6c\154"; goto FBQ8a; HzVI0: $GLOBALS["\146\x72\141\155\x65\x73"] = $this->getMainMenu(); goto c9Zm6; JcR4E: include $this->template("\167\x65\x62\x2f\150\157\155\x65\x62\x6c\x6f\x63\153");