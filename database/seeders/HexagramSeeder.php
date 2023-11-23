<?php

namespace Database\Seeders;

use App\Models\Hexagram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HexagramSeeder extends Seeder
{

    public function run(): void
    {
        $hexagrams = [
            ['number' => 1, 'symbol' => "乾", 'title' => "Ch'ien - O criativo",  'upper_trigram' => "Céu", 'bottom_trigram' => "Céu"],
            ['number' => 2, 'symbol' => "坤", 'title' => "K'un - O Receptivo",  'upper_trigram' => "Terra", 'bottom_trigram' => "Terra"],
            ['number' => 3, 'symbol' => "屯", 'title' => "Chun - Dificulade Inicial",  'upper_trigram' => "Água", 'bottom_trigram' => "Trovão"],
            ['number' => 4, 'symbol' => "蒙", 'title' => "Meng - Insensatez Juvenil",  'upper_trigram' => "Montanha", 'bottom_trigram' => "Água"],
            ['number' => 5, 'symbol' => "需", 'title' => "Hsu - A Espera",  'upper_trigram' => "Água", 'bottom_trigram' => "Céu"],
            ['number' => 6, 'symbol' => "訟", 'title' => "Sung - Conflito",  'upper_trigram' => "Céu", 'bottom_trigram' => "Água"],
            ['number' => 7, 'symbol' => "師", 'title' => "Shih - O Exército",  'upper_trigram' => "Terra", 'bottom_trigram' => "Céu"],
            ['number' => 8, 'symbol' => "比", 'title' => "Pi - Manter-se Unido",  'upper_trigram' => "Água", 'bottom_trigram' => "Terra"],
            ['number' => 9, 'symbol' => "小畜", 'title' => "Hsiao Ch'u - O Poder de Domar do Pequeno",  'upper_trigram' => "Madeira", 'bottom_trigram' => "Céu"],
            ['number' => 10, 'symbol' => "履", 'title' => "Lu - A Conduta",  'upper_trigram' => "Céu", 'bottom_trigram' => "Lago"],
            ['number' => 11, 'symbol' => "泰", 'title' => "T'ai - Paz",  'upper_trigram' => "Terra", 'bottom_trigram' => "Céu"],
            ['number' => 12, 'symbol' => "否", 'title' => "Pi - Estagnação",  'upper_trigram' => "Céu", 'bottom_trigram' => "Terra"],
            ['number' => 13, 'symbol' => "同人", 'title' => "Tung Jên - Comunidade com os Homens",  'upper_trigram' => "Céu", 'bottom_trigram' => "Fogo"],
            ['number' => 14, 'symbol' => "大有", 'title' => "Ta Yu - Grandes Posses",  'upper_trigram' => "Fogo", 'bottom_trigram' => "Céu"],
            ['number' => 15, 'symbol' => "謙", 'title' => "Ch'ien - Modéstia",  'upper_trigram' => "Terra", 'bottom_trigram' => "Montanha"],
            ['number' => 16, 'symbol' => "豫", 'title' => "Yu - Entusiasmo",  'upper_trigram' => "Trovão", 'bottom_trigram' => "Terra"],
            ['number' => 17, 'symbol' => "隨", 'title' => "Sui - Seguir",  'upper_trigram' => "Lago", 'bottom_trigram' => "Trovão"],
            ['number' => 18, 'symbol' => "蠱", 'title' => "Ku - Trabalho Sobre o que Se Deteriorou",  'upper_trigram' => "Montanha", 'bottom_trigram' => "Madeira"],
            ['number' => 19, 'symbol' => "臨", 'title' => "Lin - Aproximação",  'upper_trigram' => "Terra", 'bottom_trigram' => "Lago"],
            ['number' => 20, 'symbol' => "姤", 'title' => "Kou - Vir ao Encontro",  'upper_trigram' => "Céu", 'bottom_trigram' => "Madeira"],
            ['number' => 21, 'symbol' => "噬嗑", 'title' => "Shih Ho - Morder",  'upper_trigram' => "Fogo", 'bottom_trigram' => "Trovão"],
            ['number' => 22, 'symbol' => "賁", 'title' => "Pi - Graciosidade",  'upper_trigram' => "Montanha", 'bottom_trigram' => "Fogo"],
            ['number' => 23, 'symbol' => "剝", 'title' => "Po - Desintegração",  'upper_trigram' => "Montanha", 'bottom_trigram' => "Terra"],
            ['number' => 24, 'symbol' => "復", 'title' => "Fu - Retorno",  'upper_trigram' => "Terra", 'bottom_trigram' => "Trovão"],
            ['number' => 25, 'symbol' => "無妄", 'title' => "Wu Wang - Inocência",  'upper_trigram' => "Céu", 'bottom_trigram' => "Trovão"],
            ['number' => 26, 'symbol' => "大畜", 'title' => "Ta Ch'u - O Poder de Domar do Grande",  'upper_trigram' => "Montanha", 'bottom_trigram' => "Céu"],
            ['number' => 27, 'symbol' => "頤", 'title' => "I - As Bordas da Boca",  'upper_trigram' => "Montanha", 'bottom_trigram' => "Trovão"],
            ['number' => 28, 'symbol' => "隨", 'title' => "Ts'ui - Reunião",  'upper_trigram' => "Lago", 'bottom_trigram' => "Terra"],
            ['number' => 29, 'symbol' => "坎", 'title' => "K'an - O Abismal",  'upper_trigram' => "Água", 'bottom_trigram' => "Água"],
            ['number' => 30, 'symbol' => "離", 'title' => "Li - Aderir",  'upper_trigram' => "Fogo", 'bottom_trigram' => "Fogo"],
            ['number' => 31, 'symbol' => "咸", 'title' => "Hsien - A Influência",  'upper_trigram' => "Lago", 'bottom_trigram' => "Montanha"],
            ['number' => 32, 'symbol' => "恆", 'title' => "Heng - Duração",  'upper_trigram' => "Trovão", 'bottom_trigram' => "Madeira"],
            ['number' => 33, 'symbol' => "漸", 'title' => "Chien - Desenvolvimento",  'upper_trigram' => "Madeira", 'bottom_trigram' => "Montanha"],
            ['number' => 34, 'symbol' => "大壯", 'title' => "O Poder do Grande",  'upper_trigram' => "Trovão", 'bottom_trigram' => "Céu"],
            ['number' => 35, 'symbol' => "晉", 'title' => "Chin - Progresso",  'upper_trigram' => "Fogo", 'bottom_trigram' => "Terra"],
            ['number' => 36, 'symbol' => "明夷", 'title' => "Ming I - O Obscurecimento da Luz",  'upper_trigram' => "Terra", 'bottom_trigram' => "Fogo"],
            ['number' => 37, 'symbol' => "家人", 'title' => "Chia Jen - A Família",  'upper_trigram' => "Madeira", 'bottom_trigram' => "Fogo"],
            ['number' => 38, 'symbol' => "睽", 'title' => "K'uei - Oposição",  'upper_trigram' => "Fogo", 'bottom_trigram' => "Lago"],
            ['number' => 39, 'symbol' => "蹇", 'title' => "Chien - Obstrução",  'upper_trigram' => "Água", 'bottom_trigram' => "Montanha"],
            ['number' => 40, 'symbol' => "解", 'title' => "Hsieh - Liberação",  'upper_trigram' => "Trovão", 'bottom_trigram' => "Água"],
            ['number' => 41, 'symbol' => "損", 'title' => "Sun - Diminuição",  'upper_trigram' => "Montanha", 'bottom_trigram' => "Lago"],
            ['number' => 42, 'symbol' => "益", 'title' => "I - Aumento",  'upper_trigram' => "Madeira", 'bottom_trigram' => "Trovão"],
            ['number' => 43, 'symbol' => "夬", 'title' => "Kuai - Irromper",  'upper_trigram' => "Lago", 'bottom_trigram' => "Céu"],
            ['number' => 44, 'symbol' => "觀", 'title' => "Kuan - Contemplação",  'upper_trigram' => "Madeira", 'bottom_trigram' => "Terra"],
            ['number' => 45, 'symbol' => "大過", 'title' => "Ta Kuo - A Preponderâcia do Grande",  'upper_trigram' => "Lago", 'bottom_trigram' => "Madeira"],
            ['number' => 46, 'symbol' => "升", 'title' => "Chêng - Ascensão",  'upper_trigram' => "Terra", 'bottom_trigram' => "Madeira"],
            ['number' => 47, 'symbol' => "困", 'title' => "K'un - Opressão",  'upper_trigram' => "Lago", 'bottom_trigram' => "Água"],
            ['number' => 48, 'symbol' => "井", 'title' => "Ching - O Poço",  'upper_trigram' => "Água", 'bottom_trigram' => "Madeira"],
            ['number' => 49, 'symbol' => "革", 'title' => "Ko - Revolução",  'upper_trigram' => "Lago", 'bottom_trigram' => "Fogo"],
            ['number' => 50, 'symbol' => "鼎", 'title' => "Ting - O Caldeirão",  'upper_trigram' => "Fogo", 'bottom_trigram' => "Madeira"],
            ['number' => 51, 'symbol' => "震", 'title' => "Chên - O Incitar",  'upper_trigram' => "Trovão", 'bottom_trigram' => "Trovão"],
            ['number' => 52, 'symbol' => "艮", 'title' => "Kên - A Quietude",  'upper_trigram' => "Montanha", 'bottom_trigram' => "Montanha"],
            ['number' => 53, 'symbol' => "遯", 'title' => "Tun - A Retirada",  'upper_trigram' => "Céu", 'bottom_trigram' => "Montanha"],
            ['number' => 54, 'symbol' => "歸妹", 'title' => "Kuei Mei - A Jovem que se Casa",  'upper_trigram' => "Trovão", 'bottom_trigram' => "Lago"],
            ['number' => 55, 'symbol' => "豐", 'title' => "Fêng - Abundância",  'upper_trigram' => "Trovão", 'bottom_trigram' => "Fogo"],
            ['number' => 56, 'symbol' => "旅", 'title' => "Lü - O Viajante",  'upper_trigram' => "Fogo", 'bottom_trigram' => "Montanha"],
            ['number' => 57, 'symbol' => "巽", 'title' => "Sun - A Suavidade",  'upper_trigram' => "Madeira", 'bottom_trigram' => "Madeira"],
            ['number' => 58, 'symbol' => "兌", 'title' => "Tui - A Alegria",  'upper_trigram' => "Lago", 'bottom_trigram' => "Lago"],
            ['number' => 59, 'symbol' => "渙", 'title' => "Huan - Dispersão",  'upper_trigram' => "Madeira", 'bottom_trigram' => "Água"],
            ['number' => 60, 'symbol' => "節", 'title' => "Chieh - Limitação",  'upper_trigram' => "Água", 'bottom_trigram' => "Lago"],
            ['number' => 61, 'symbol' => "中孚", 'title' => "Chung Fu - Verdade Interior",  'upper_trigram' => "Madeira", 'bottom_trigram' => "Lago"],
            ['number' => 62, 'symbol' => "小過", 'title' => "Hsiao Kuo - A Preponderância do Pequeno",  'upper_trigram' => "Trovão", 'bottom_trigram' => "Montanha"],
            ['number' => 63, 'symbol' => "既濟", 'title' => "Chi Chi - Após a Conclusão",  'upper_trigram' => "Água", 'bottom_trigram' => "Fogo"],
            ['number' => 64, 'symbol' => "未濟", 'title' => "Wei Chi - Antes da Conclusão",  'upper_trigram' => "Fogo", 'bottom_trigram' => "Água"],


            //                    /*                  céu                                         terra                                                  trovão                                                 água                                      montanha                                                                madeira                       fogo                                 lago               */
//   /* céu -----*/ ["céu", "céu", "Ch'ien - O criativo", "乾", 1],["terra", "céu", "T'ai - Paz", "泰", 11],["trovão", "céu", "Ta Chuang - O Poder do Grande", "大壯", 34],["água", "céu", "Hsu - A Espera", "需", 5],["montanha", "céu", "Ta Ch'u - O Poder de Domar do Grande", "大畜", 26],["madeira", "céu", "Hsiao Ch'u - O Poder de Domar do Pequeno", "	小畜", 9],["fogo", "céu", "Ta Yu - Grandes Posses", "大有", 14],["lago", "céu", "Kuai - Irromper", "夬", 43],
//   /* terra ---*/ ["céu", "terra", "Pi - Estagnação", "否", 12],["terra", "terra", "K'un - O Receptivo", "坤", 2],["trovão", "terra", "Yu - Entusiasmo", "豫", 16],["água", "terra", "Pi - Manter-se Unido", "比", 8],["montanha", "terra", "Po - Desintegração", "剝", 23],["madeira", "terra", "Kuan - Contemplação", "觀", 20],["fogo", "terra", "Chin - Progresso", "晉", 35],["lago", "terra", "Ts'ui - Reunião", "萃", 45],
//   /* trovão --*/ ["céu", "trovão", "Wu Wang - Inocência", "無妄", 25],["terra", "trovão", "Fu - Retorno", "	復", 24],["trovão", "trovão", "Chên - O Incitar", "震", 51],["água", "trovão", "Chun - Dificulade Inicial", "屯", 3],["montanha", "trovão", "I - As Bordas da Boca", "頤", 27],["madeira", "trovão", "I - Aumento", "益", 42],["fogo", "trovão", "Shih Ho - Morder", "噬嗑", 21],["lago", "trovão", "Sui - Seguir", "隨", 17],
//   /* água ----*/ ["céu", "água", "Sung - Conflito", "訟", 6],["terra", "água", "Shih - O Exército", "師", 7],["trovão", "água", "Hsieh - Liberação", "解", 40],["água", "água", "K'an - O Abismal", "坎", 29],["montanha", "água", "Meng - Insensatez Juvenil", "蒙", 4],["madeira", "água", "Huan - Dispersão", "渙", 59],["fogo", "água", "Wei Chi - Antes da Conclusão", "未濟", 64],["lago", "água", "K'un - Opressão", "困", 47],
//   /* montanha */ ["céu", "montanha", "Tun - A Retirada", "遯", 33],["terra", "montanha", "Ch'ien - Modéstia", "謙", 15],["trovão", "montanha", "Hsiao Kuo - A Preponderância do Pequeno", "小過", 62],["água", "montanha", "Chien - Obstrução", "蹇", 39],["montanha", "montanha", "Kên - A Quietude", "艮", 52],["madeira", "montanha", "Chien - Desenvolvimento", "漸", 53],["fogo", "montanha", "Lü - O Viajante", "旅", 56],["lago", "montanha", "Hsien - A Influência", "咸", 31],
//   /* madeira -*/ ["céu", "madeira", "Kou - Vir ao Encontro", "姤", 44],["terra", "madeira", "Chêng - Ascensão", "升", 46],["trovão", "madeira", "Heng - Duração", "恆", 32],["água", "madeira", "Ching - O Poço", "井", 48],["montanha", "madeira", "Ku - Trabalho Sobre o que Se Deteriorou", "蠱", 18],["madeira", "madeira", "Sun - A Suavidade", "巽", 57],["fogo", "madeira", "Ting - O Caldeirão", "鼎", 50],["lago", "madeira", "Ta Kuo - A Preponderâcia do Grande", "大過", 28],
//   /* fogo ----*/ ["céu", "fogo", "Tung Jên - Comunidade com os Homens", "同人", 13],["terra", "fogo", "Ming I - O Obscurecimento da Luz", "明夷", 36],["trovão", "fogo", "Fêng - Abundância", "豐", 55],["água", "fogo", "Chi Chi - Após a Conclusão", "既濟", 63],["montanha", "fogo", "Pi - Graciosidade", "賁", 22],["madeira", "fogo", "Chia Jen - A Família", "家人", 37],["fogo", "fogo", "Li - Aderir", "離", 30],["lago", "fogo", "Ko - Revolução", "革", 49],
//   /* lago ----*/ ["céu", "lago", "Lu - A Conduta", "履", 10],["terra", "lago", "Lin - Aproximação", "臨", 19],["trovão", "lago", "Kuei Mei - A Jovem que se Casa", "歸妹", 54],["água", "lago", "Chieh - Limitação", "節", 60],["montanha", "lago", "Sun - Diminuição", "損", 41],["madeira", "lago", "Chung Fu - Verdade Interior", "中孚", 61],["fogo", "lago", "K'uei - Oposição", "睽", 38],["lago", "lago", "Tui - A Alegria", "兌", 58],

    /**
     * Run the database seeds.
     */
        ];
        Hexagram::insert($hexagrams);
    }
}
