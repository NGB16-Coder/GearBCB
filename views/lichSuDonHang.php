                                                    <td>
                                                        <a
                                                            href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $item['sp_id'] ?>">
                                                            <?= $item['ten_sp'] ?>
                                                        </a>
                                                    </td>
                                                    <td><?= $item['so_luong_mua'] ?>
                                                    </td>
                                                    <td><?= number_format($item['gia_mua']) ?>₫
                                                    </td>
                                                    <td><?= number_format($thanhTien) ?>₫
                                                    </td>