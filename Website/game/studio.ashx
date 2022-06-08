%Tt2ohNMs1HkEI6EfXYR1Cf9QQPOmKhrni3rdgQ3XBbfJ5goRFik6xl3PyLqZ2tyxHI8NvPEAIrZvaYHl097w/NW7UgZRfHoPW/grailBj9q7I36t3uu59utvV/EpgdIv9J12DrL+x1a2evv/qzNl6+hUS5hi6Z1qAlq3FvwodjE=%pcall(function() game:GetService("InsertService"):SetFreeDecalUrl("https://www.roblox.com/Game/Tools/InsertAsset.ashx?type=fd&q=%s&pg=%d&rs=%d") end)

game:GetService("ScriptInformationProvider"):SetAssetUrl("http://www.roblox.com/Asset/")
game:GetService("InsertService"):SetBaseSetsUrl("http://www.roblox.com/Game/Tools/InsertAsset.ashx?nsets=10&type=base")
game:GetService("InsertService"):SetUserSetsUrl("http://www.roblox.com/Game/Tools/InsertAsset.ashx?nsets=20&type=user&userid=%d")
game:GetService("InsertService"):SetCollectionUrl("http://www.roblox.com/Game/Tools/InsertAsset.ashx?sid=%d")
game:GetService("InsertService"):SetAssetUrl("http://pippithecat.cf/asset/?id=%d")
game:GetService("InsertService"):SetAssetVersionUrl("http://www.roblox.com/Asset/?assetversionid=%d")

pcall(function() game:GetService("SocialService"):SetFriendUrl("http://egg2011.egg-in-anus.cf/Game/HandleSocialRequest.xml") end)
pcall(function() game:GetService("SocialService"):SetBestFriendUrl("http://egg2011.egg-in-anus.cf/Game/HandleSocialRequest.xml") end)
pcall(function() game:GetService("SocialService"):SetGroupUrl("http://www.roblox.com/Game/LuaWebService/HandleSocialRequest.ashx?method=IsInGroup&playerid=%d&groupid=%d") end)

local result = pcall(function() game:GetService("ScriptContext"):AddStarterScript(1) end)
if not result then
  pcall(function() game:GetService("ScriptContext"):AddCoreScript(1,game:GetService("ScriptContext"),"StarterScript") end)
end