開發環境
==============
PHP 5.5

功能
==============
把 json 轉成 Android gson class format

使用方式
==============
1. 於首頁左邊輸入 JSON
2. 右邊選擇需要 parse 的欄位，並選擇型態
3. 按下送出即可在下方看到 java code
4. 套用到 Android
```java
Gson mGson = new Gson();
WeiTsai mWei = mGson.fromjson(WeiTsai.class);
```

範例
==============
input:
```json
{
   "name":"weitsai",
   "address":"高雄"
}
```

output:
```java
public class weitsai_test {
        private String name;
        private String address;

        /**
         * @param String
         */
        public void setName(String name) {
        }

        /**
         * @return String
         */
        public String getName() {
                return this.name;
        }

        /**
         * @param String
         */
        public void setAddress(String address) {
        }

        /**
         * @return String
         */
        public String getAddress() {
                return this.address;
        }
}
```


[Demo](http://json2class.herokuapp.com/)
