<?php
 goto QL1BW; zGh3S: pdo_delete("\x6c\142\163\150\x5f\x6d\x79\x6b\x6f\x72\x64\x65\162", array("\151\x64" => $id)); goto lf37k; G7RZ8: $total = pdo_fetchcolumn("\x73\145\154\145\x63\x74\x20\143\157\x75\156\x74\x28\60\x29\40\146\x72\x6f\155\40" . tablename("\x6c\x62\x73\150\x5f\x6d\171\x6b\x6f\x72\x64\145\x72") . "\x20\141\40\x6a\157\151\x6e\40" . tablename("\x6c\142\x73\150\x5f\165\x73\145\162") . "\x20\142\40\x6f\156\40\141\x2e\x75\163\145\x72\x5f\151\144\75\142\x2e\151\144\x20\127\x48\x45\122\105\40{$where}\x20", array("\x3a\165\x6e\151\x61\143\x69\144" => $_W["\165\x6e\151\x61\143\x69\x64"])); goto JMSIs; MKgFt: if (!empty($_GPC["\151\144\x73"])) { goto uDmDb; } goto gQoI4; kqSWr: $uniacid = $_W["\165\156\151\141\143\x69\144"]; goto L78dG; Yg7kk: csFZr: goto na7h3; x6jkQ: goto csFZr; goto OuBch; oeezs: $redtypeid = $_GPC["\x72\145\144\164\x79\160\x65\151\144"]; goto Xdy3z; WIGcD: message("\345\x88\xa0\351\x99\244\xe6\x88\x90\xe5\x8a\237\357\xbc\x81\357\xbc\201", $_GPC["\152\x79\137\x6c\x62\x73\x68\137\155\171\153\x6f\162\144\145\162\137\x73\151\x74\x65\x75\x72\154"], "\x73\x75\143\x63\x65\x73\163"); goto Yg7kk; ceXvC: $where .= "\40\141\x6e\x64\40\50\x61\56\157\x72\x64\145\x72\x6e\157\40\x4c\x49\113\105\40\x20\x63\157\x6e\x63\141\164\50\x27\45\47\54\x20" . "\47" . $name . "\47" . "\54\x27\x25\x27\51\40\157\162\x20\x62\56\156\141\x6d\145\x20\114\x49\113\105\x20\x20\x63\157\156\x63\x61\x74\50\47\x25\47\x2c\x20" . "\47" . $name . "\47" . "\x2c\x27\45\47\51\40\x29"; goto Pm3Yv; L78dG: $id = $_GPC["\151\144"]; goto oeezs; OuBch: oXVEr: goto ZzKZn; iflgF: pdo_query("\x44\x45\x4c\105\124\x45\40\106\122\x4f\115\x20" . tablename("\x6c\142\163\x68\137\155\x79\153\x6f\162\144\x65\162") . "\40\x57\110\105\122\x45\x20\151\144\x20\151\156\x20\x28" . $ids . "\51"); goto WIGcD; TuDxO: iJN6l: goto MKgFt; x_y_d: czJpp: goto zGh3S; mxbPF: if (!$_GPC["\153\145\x79\167\x6f\x72\x64\x73"]) { goto p59iN; } goto ceXvC; Hcrsi: goto csFZr; goto TuDxO; t2zBd: isetcookie("\152\x79\137\154\142\163\150\x5f\155\x79\x6b\x6f\162\x64\145\162\137\163\151\x74\x65\x75\x72\x6c", $_W["\x73\x69\x74\145\165\162\x6c"]); goto R2l66; rDmMN: $sql = "\x73\145\154\145\143\x74\x20\141\56\x2a\x2c\142\56\x6e\x61\x6d\x65\40\141\x73\x20\165\163\x65\162\156\141\x6d\145\40\x20\146\x72\157\155\40" . tablename("\154\142\163\150\x5f\155\x79\153\x6f\x72\144\x65\162") . "\x20\x61\x20\x6a\157\151\156\x20" . tablename("\x6c\142\x73\150\137\x75\163\145\162") . "\x20\142\40\157\x6e\40\x61\56\165\163\x65\x72\x5f\x69\x64\x3d\142\x2e\x69\144\40\127\110\105\122\105\x20{$where}\x20\x6f\162\144\x65\x72\x20\142\x79\40\x61\x2e\141\x64\x64\x74\x69\155\145\x20\x64\x65\163\x63\x2c\141\56\151\144\40\x64\x65\x73\143\x20"; goto UayK9; N1d5q: if ($_GPC["\x64\x65\x6c\x61\x6c\154"]) { goto iJN6l; } goto x6jkQ; gQoI4: message("\350\257\xb7\351\x80\211\xe6\213\xa9\345\x85\x8d\347\x96\xab\345\x8d\xa1\xe8\xae\242\xe5\215\225", '', "\x65\x72\162\157\x72"); goto RXwk5; na7h3: $where = "\x20\x61\56\x75\156\151\141\143\151\x64\75\72\165\156\x69\141\x63\151\144\40"; goto sHO0X; Xdy3z: if ($_GPC["\x6f\x70"] == "\144\145\x6c") { goto oXVEr; } goto N1d5q; fLASd: $GLOBALS["\x66\x72\141\155\x65\163"] = $this->getMainMenu(); goto kqSWr; RXwk5: uDmDb: goto XI45U; XI45U: $ids = implode("\54", $_GPC["\151\144\x73"]); goto iflgF; ozxan: $pageindex = max(1, intval($_GPC["\x70\141\147\x65"])); goto aaMgg; sHO0X: $name = $_GPC["\x6b\145\x79\x77\x6f\162\144\x73"]; goto mxbPF; cX06X: $hangye = pdo_getall("\154\142\163\150\x5f\x6d\171\153\157\162\144\145\x72", array("\165\x6e\x69\141\143\x69\x64" => $_W["\x75\x6e\x69\141\x63\x69\x64"])); goto ozxan; UayK9: $select_sql = $sql . "\40\114\x49\115\111\x54\x20" . ($pageindex - 1) * $pagesize . "\54" . $pagesize; goto ZzHuJ; Pm3Yv: p59iN: goto cX06X; ZzKZn: if (!empty($_GPC["\x69\144"])) { goto czJpp; } goto QZGxg; JMSIs: $pager = pagination($total, $pageindex, $pagesize); goto t2zBd; QL1BW: global $_GPC, $_W; goto fLASd; ZzHuJ: $list = pdo_fetchall($select_sql, array("\x3a\165\x6e\x69\141\143\x69\x64" => $_W["\x75\x6e\151\x61\x63\x69\144"])); goto G7RZ8; aaMgg: $pagesize = 12; goto rDmMN; QZGxg: message("\xe5\217\202\346\225\260\xe6\234\211\xe8\257\xaf", '', "\145\x72\x72\x6f\162"); goto x_y_d; lf37k: message("\xe5\x88\240\xe9\231\244\xe6\210\220\xe5\x8a\237\xef\xbc\201\xef\xbc\201", $_GPC["\x6a\x79\x5f\x6c\x62\x73\x68\137\155\171\153\x6f\162\144\x65\x72\137\x73\151\x74\145\165\162\154"], "\163\165\143\x63\x65\163\x73"); goto Hcrsi; R2l66: include $this->template("\x77\x65\x62\57\155\x79\x6b\x6f\x72\144\x65\162");