<?php
 goto rOGgd; dEvI5: TIyoJ: goto Cw26I; wTfuR: EAT0G: goto dEvI5; Vo5fv: if (!empty($data["\163\157\162\x74"])) { goto eo9fr; } goto SXDTZ; WSSq7: cache_delete($keys); goto zhBRI; fN8K_: jcQXq: goto ZoYS1; ZoYS1: cache_delete($keys); goto hQm0B; SXDTZ: $data["\163\x6f\x72\x74"] = 99; goto x5E7q; QfPJY: message("\xe6\267\273\345\x8a\xa0\xe5\244\261\350\264\xa5", '', "\x65\162\x72\x6f\162"); goto CWahK; kS2Gs: $data["\163\x6f\x72\164"] = $_GPC["\x73\x6f\162\164"]; goto uMZAG; YVYxi: $keys = "\145\170\160\x72\x65\163\x73" . $_W["\165\156\151\141\143\x69\144"] . "\141\154\154"; goto w4Ew7; w4Ew7: $key_arr = array("\165\x6e\x69\141\143\151\x64" => $_W["\x75\156\x69\x61\x63\151\x64"]); goto FSw50; R7eAR: $info = pdo_get("\154\x62\x73\x68\x5f\x65\x78\160\162\145\163\x73", array("\x75\x6e\151\x61\143\x69\144" => $_W["\x75\156\151\141\x63\151\144"], "\x69\x64" => $_GPC["\151\144"])); goto YVYxi; x5E7q: eo9fr: goto irusV; rOGgd: global $_GPC, $_W; goto ovD7f; OWS8U: $res = pdo_insert("\154\x62\x73\150\137\x65\x78\160\162\145\163\163", $data); goto esMiM; MXmDQ: $data["\x61\144\144\x74\x69\155\x65"] = time(); goto Vo5fv; pVYM6: if (!checksubmit("\x73\165\142\x6d\x69\x74")) { goto eofSo; } goto kS2Gs; tLZhN: goto TIyoJ; goto rGpgT; uMZAG: $data["\164\151\164\x6c\x65"] = $_GPC["\164\151\164\x6c\x65"]; goto MXmDQ; CWahK: goto EAT0G; goto fN8K_; jtc1n: goto WdQMN; goto rBuhT; fR0m6: message("\xe7\274\x96\350\xbe\x91\345\244\xb1\350\264\245", '', "\x65\x72\162\x6f\162"); goto jtc1n; ovD7f: $GLOBALS["\x66\x72\x61\x6d\145\x73"] = $this->getMainMenu(); goto R7eAR; irusV: if ($_GPC["\x69\144"] == '') { goto Aho75; } goto mkgtQ; mkgtQ: $res = pdo_update("\154\142\163\x68\137\x65\x78\160\x72\145\163\x73", $data, array("\151\x64" => $_GPC["\x69\x64"])); goto jB7JD; rGpgT: Aho75: goto raZUi; ulaJs: WdQMN: goto tLZhN; jB7JD: if ($res) { goto OtV5M; } goto fR0m6; hQm0B: message("\346\xb7\xbb\345\212\240\346\210\x90\xe5\x8a\237", $this->createWebUrl("\145\170\160\x72\145\x73\x73", array()), "\x73\x75\143\x63\x65\163\163"); goto wTfuR; FSw50: $keys = $keys . md5(json_encode($key_arr)) . md5(json_encode(array("\163\x6f\x72\x74\40\x61\163\x63"))); goto pVYM6; zhBRI: message("\347\xbc\x96\350\276\221\xe6\x88\x90\xe5\212\237", $this->createWebUrl("\145\x78\x70\162\145\163\163", array()), "\163\x75\x63\x63\145\163\163"); goto ulaJs; rBuhT: OtV5M: goto WSSq7; Cw26I: eofSo: goto RIhOP; esMiM: if ($res) { goto jcQXq; } goto QfPJY; raZUi: $data["\x75\x6e\x69\141\x63\151\144"] = $_W["\x75\x6e\x69\x61\x63\151\144"]; goto OWS8U; RIhOP: include $this->template("\167\x65\x62\x2f\x61\144\x64\145\x78\160\x72\145\163\x73");