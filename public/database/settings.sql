-- -------------------------------------------------------------
-- TablePlus 3.1.2(296)
--
-- https://tableplus.com/
--
-- Database: learning
-- Generation Time: 2020-03-08 18:13:37.2060
-- -------------------------------------------------------------


DROP TABLE IF EXISTS "public"."settings";
-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Table Definition
CREATE TABLE "public"."settings" (
    "id" uuid NOT NULL,
    "description" text NOT NULL,
    "key" varchar(255) NOT NULL,
    "value" varchar(255) NOT NULL,
    PRIMARY KEY ("id")
);

INSERT INTO "public"."settings" ("id", "description", "key", "value") VALUES
('16bc3968-2ceb-4529-ba49-2d58757da4db', 'Subscription Expire URL', 'expire_subscription_url', 'uploadfile/10th_Guj/Planexpirevideo.mp4'),
('44d63636-ffaf-4e25-8cbb-7888903f09eb', 'No Subscription URL', 'no_subscription_url', 'uploadfile/10th_Guj/notsubscribe/Not-Subscribed.mp4'),
('541b57d6-8a1b-4093-bba5-efb0bc216bd3', 'Facebook', 'facebook', 'https://www.facebook.com/MilestoneEducom'),
('54a6bd94-d1ab-4049-a6e3-9e114278fc7d', 'Video URL', 'video_url', 'https://api.shendre.com'),
('ef138a6f-b5cd-44f2-9299-04027b118890', 'YouTube Channel', 'youtube_channel', 'https://www.youtube.com/channel/UCPg0-WocTNNVI0q5NlvkkPA');
